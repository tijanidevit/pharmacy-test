<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Log;


class ExpiringProductNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected array $data)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        //'vonage',
        return ['mail','vonage','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $content = "<ol>";
        foreach ($this->data['stocks'] as $stock) {
            $content.= "<li>" .$stock->product?->name . " with batch number $stock->batch_no purchased on $stock->purchase_date will expire on $stock->created_at. There are $stock->remaining_quantity items left </li>";
        }

        $content .= "</ol>";

        Log::info("Email sending");
        return (new MailMessage)
                    ->greeting('Hello Jendol,')
                    ->line($this->data['message'])
                    ->line(new HtmlString($content))
                    ->action('Go to dashboard', route('dashboard'))
                    ->line('Thumps up!');
    }


    public function toArray(object $notifiable): array
    {
        return $this->data;
    }

    public function toDatabase(object $notifiable): array
    {
        return $this->data;
    }

    public function toVonage(object $notifiable): VonageMessage
    {
        Log::info("SMS sending");
        $content = "";
        foreach ($this->data['stocks'] as $stock) {
            $content.= $stock->product?->name.", ";
        }

        return (new VonageMessage)
                    ->from('Jendol Alert System')
                    ->content($this->data['message'].". $content");
    }
}
