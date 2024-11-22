<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class InvoicePaid extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $invoices;
    public function __construct($invoices)
    {
        $this->invoices = $invoices;
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
        $url = url('/invoice/'.$this->invoices->id);

        return (new MailMessage)
                    ->line("you'r payment due date is over")
                    ->line("Your invoice (ID: {$this->invoices->invoice_number}) payment is overdue.")
                    ->action('View Invoice', $url)
                    ->line("Due Date: " . Carbon::parse($this->invoices->due_date)->format('Y-m-d'))
                    ->line("Amount Due: {$this->invoices->total_amount}")
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'invoice_number' => $this->invoices->invoice_number,
            'amount_due' => $this->invoices->total_amount,
            'due_date' => $this->invoices->due_date,
        ];
    }
}
