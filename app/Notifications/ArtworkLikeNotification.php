<?php

namespace App\Notifications;

use App\Models\Artwork;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ArtworkLikeNotification extends Notification
{
    use Queueable;

    protected $liker;

    protected $artwork;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $liker, Artwork $artwork)
    {
        $this->liker = $liker;
        $this->artwork = $artwork;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'liker' => $this->liker,
            'artwork' => $this->artwork,
        ];
    }
}
