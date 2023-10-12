<?php

namespace App\Notifications\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Product;

class ProductOrderedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected Product $product, protected int $quantity, protected int $price)
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
        $quantity = $this->quantity;
        $product = $this->product;
        return (new MailMessage)
                    ->subject('Welcome to Lytton Pharmacy.')
                    ->line('You have just been ordered a new product. Find your order details below')
                    ->line("Product: $product->name")
                    ->line("Price: NGN$product->price * $quantity = NGN$this->price")
                    ->action('View Orders', route('customer.purchase.index'));
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
