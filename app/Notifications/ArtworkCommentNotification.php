<?php

namespace App\Notifications;

use App\Models\Artwork;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ArtworkCommentNotification extends Notification
{
    use Queueable;

    protected $commenter;

    protected $artwork;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $commenter, Artwork $artwork)
    {
        $this->commenter = $commenter;
        $this->artwork = $artwork;
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

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'commenter' => $this->commenter,
            'artwork' => $this->artwork
        ];
    }
}
