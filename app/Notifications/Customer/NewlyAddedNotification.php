<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class NewlyAddedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected User $user, protected string $plainPassword)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $name = $this->user->name;
        $email = $this->user->email;
        $plainPassword = $this->plainPassword;
        return (new MailMessage)
                    ->subject('Welcome to Lytton Pharmacy.')
                    ->line("Hello, $name,")
                    ->line('You have just been added to Lytton Pharmacy website. Find your login details below')
                    ->line("Email address: $email")
                    ->line("Password: $plainPassword")
                    ->action('Login here', route('login'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
