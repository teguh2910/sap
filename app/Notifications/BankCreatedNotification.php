<?php

namespace App\Notifications;

use App\Models\Bank;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class BankCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public Bank $bank;

    /**
     * Create a new notification instance.
     */
    public function __construct(Bank $bank)
    {
        $this->bank = $bank;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New Bank Created in SAP System')
                    ->greeting('Hello!')
                    ->line('A new bank has been created in the SAP system.')
                    ->line('Bank Name: ' . $this->bank->nama_bank)
                    ->line('Bank Code: ' . $this->bank->kode_bank)
                    ->action('View Bank Details', url('/banks/' . $this->bank->id_bank))
                    ->line('Thank you for using our SAP system!');
    }

    /**
     * Get the database representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'bank_id' => $this->bank->id_bank,
            'bank_name' => $this->bank->nama_bank,
            'bank_code' => $this->bank->kode_bank,
            'message' => 'New bank "' . $this->bank->nama_bank . '" has been created.',
            'action_url' => url('/banks/' . $this->bank->id_bank),
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     */
    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'bank_id' => $this->bank->id_bank,
            'bank_name' => $this->bank->nama_bank,
            'message' => 'New bank "' . $this->bank->nama_bank . '" has been created.',
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'bank_id' => $this->bank->id_bank,
            'bank_name' => $this->bank->nama_bank,
            'bank_code' => $this->bank->kode_bank,
        ];
    }
}
