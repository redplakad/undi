<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GenerateKuponDeposito extends Notification implements ShouldQueue
{
    use Queueable;

    private $message;

    /**
     * Create a new notification instance.
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        // Mengirim via database dan email
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */

    /**
     * Get the array representation of the notification.
     */
    public function toDatabase($notifiable)
    {
        return [
            "actions" => [],
            "body" => $this->message, // Menggunakan pesan dinamis
            "color" => null,
            "duration" => "persistent",
            "icon" => "heroicon-o-check-circle",
            "iconColor" => "success",
            "status" => "success",
            "title" => "Generate Completed",
            "view" => "filament-notifications::notification",
            "viewData" => [],
            "format" => "filament",
        ];
    }
}