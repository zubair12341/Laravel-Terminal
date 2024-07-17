<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class InvoiceCreated extends Notification
{
    protected $invoice;
    protected $paymentLink;
    protected $recipientEmail;

    public function __construct($invoice, $paymentLink, $recipientEmail)
    {
        $this->invoice = $invoice;
        $this->paymentLink = $paymentLink;
        $this->recipientEmail = $recipientEmail;
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

     public function toMail($notifiable)
{
    $invoice = $this->invoice;

    return (new MailMessage)
        ->subject('Invoice Created')
        ->greeting('Hello')
        ->line('An invoice has been created for you.')
        ->line('Invoice Details:')
        ->line('Amount: $' . $invoice->amount)
        ->line('Description: ' . $invoice->description)
        ->line('Brand: ' . $invoice->brand)
        ->line('Invoice Type: ' . $invoice->invoice_type)
        ->action('Pay Now', $this->paymentLink)
        ->line('Thank you for your business!');
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
