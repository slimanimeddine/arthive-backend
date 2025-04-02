<?php

namespace App\Notifications;

use App\Models\ArtistVerificationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class ArtistVerificationResponseNotification extends Notification
{
    use Queueable;

    protected $artistVerificationRequest;

    /**
     * Create a new notification instance.
     */
    public function __construct(ArtistVerificationRequest $artistVerificationRequest)
    {
        $this->artistVerificationRequest = $artistVerificationRequest;
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
            'id' => $this->artistVerificationRequest->id,
            'status' => $this->artistVerificationRequest->status,
            'reason' => $this->artistVerificationRequest->reason,
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
        return 'artist-verification-response';
    }

    /**
     * Get the notification's database type.
     *
     * @return string
     */
    public function databaseType(object $notifiable): string
    {
        return 'artist-verification-response';
    }
}
