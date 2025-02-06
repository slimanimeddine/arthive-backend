<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ArtistVerificationResponseNotification extends Notification
{
    use Queueable;

    protected $status;
    protected $reason;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $status, string $reason = '')
    {
        $this->status = $status;
        $this->reason = $reason;
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
            'status' => $this->status,
            'reason' => $this->reason,
        ];
    }
}
