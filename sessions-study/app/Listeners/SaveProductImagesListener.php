<?php

namespace App\Listeners;

use App\Actions\ImageModalSave;
use App\traits\upload_image;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveProductImagesListener
{
    use upload_image;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        foreach ($event->images as $image) {
            $name = $this->upload($image, folder_name: 'products');
            ImageModalSave::make($event->product->id,'products',$name);
        }
        //dd('now Listener working', $event->data, $event->images, $event->product);
    }
}
