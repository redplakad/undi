<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExportCompletedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $fileName;
    protected $message;
    protected $title;

    /**
     * Create a new notification instance.
     *
     * @param string $fileName
     */
    public function __construct($fileName, $title, $message)
    {
        $this->fileName = $fileName;
        $this->title    = $title;
        $this->message      = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $csvDownloadUrl = url('/download-csv?file=' . $this->fileName);
        $xlsxDownloadUrl = str_replace('.csv', '.xlsx', $csvDownloadUrl);
        // menyimpan notfi ke database degnan format filament
        return [
            "actions" => [
                [
                    "name" => "download_csv",
                    "color" => null,
                    "event" => null,
                    "eventData" => [],
                    "dispatchDirection" => false,
                    "dispatchToComponent" => null,
                    "extraAttributes" => [],
                    "icon" => null,
                    "iconPosition" => "before",
                    "iconSize" => null,
                    "isOutlined" => false,
                    "isDisabled" => false,
                    "label" => "Download .csv",
                    "shouldClose" => false,
                    "shouldMarkAsRead" => false,
                    "shouldMarkAsUnread" => false,
                    "shouldOpenUrlInNewTab" => false,
                    "size" => "sm",
                    "tooltip" => null,
                    "url" => $csvDownloadUrl,
                    "view" => "filament-actions::link-action"
                ],
            ],
            "body" => $this->message,
            "color" => null,
            "duration" => "persistent",
            "icon" => "heroicon-o-check-circle",
            "iconColor" => "success",
            "status" => "success",
            "title" => $this->title,
            "view" => "filament-notifications::notification",
            "viewData" => [],
            "format" => "filament"
        ];
    }
} 
