<?php

namespace App\Notifications;

use App\Models\Artwork;
use App\Models\ArtworkComment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class ArtworkCommentNotification extends Notification
{
    use Queueable;

    protected $commenter;

    protected $artwork;

    protected $comment;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $commenter, Artwork $artwork, ArtworkComment $comment)
    {
        $this->commenter = $commenter;
        $this->artwork = $artwork;
        $this->comment = $comment;
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
            'commenter' => [
                'id' => $this->commenter->id,
                'username' => $this->commenter->username,
                'first_name' => $this->commenter->first_name,
                'last_name' => $this->commenter->last_name,
            ],
            'artwork' => [
                'id' => $this->artwork->id,
                'title' => $this->artwork->title
            ],
            'comment' => [
                'id' => $this->comment->id,
            ]
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     */
    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage($this->toArray($notifiable));
    }

    /**
     * Get the type of the notification being broadcast.
     */
    public function broadcastType(): string
    {
        return 'artwork-comment';
    }

    /**
     * Get the notification's database type.
     *
     * @return string
     */
    public function databaseType(object $notifiable): string
    {
        return 'artwork-comment';
    }
}
