<?php

namespace App\Observers;

use App\Models\subscriptions;
use App\Models\User;
use App\Notifications\SubscriptionNotification;

class SubscriptionObserver
{
    /**
     * Handle the subscriptions "created" event.
     */
    public function created(subscriptions $subscriptions): void
    {
        //dd($subscriptions);
        $user = User::query()->where('type','=','admin')->first();
        $user->notify(new SubscriptionNotification($subscriptions));
    }

    /**
     * Handle the subscriptions "updated" event.
     */
    public function updated(subscriptions $subscriptions): void
    {
        //
    }

    /**
     * Handle the subscriptions "deleted" event.
     */
    public function deleted(subscriptions $subscriptions): void
    {
        //
    }

    /**
     * Handle the subscriptions "restored" event.
     */
    public function restored(subscriptions $subscriptions): void
    {
        //
    }

    /**
     * Handle the subscriptions "force deleted" event.
     */
    public function forceDeleted(subscriptions $subscriptions): void
    {
        //
    }
}
