<?php

namespace App\Notifications;

use App\Models\subjects;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionNotification extends Notification
{
    use Queueable;



    /**
     * Create a new notification instance.
     */
    public function __construct(private $data)
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];

    }
    public function toDatabase($notifiable)
    {
        $subject = subjects::query()->with('user')->find($this->data->subject_id);

        $data = [
            'data' => json_encode([
                'ar' => 'تم إضافة الاشتراك الجديد في مادة ' . json_decode($subject->name, true)['ar'] . ' بواسطه دكتور ' . $subject->user->username,
                'en' => 'New subscription added at subject name ' . $subject->id
            ], JSON_UNESCAPED_SLASHES),
            'sender_id' => $subject->user->id,
        ];

        return $data;
    }
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
