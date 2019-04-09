<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PendaftaranPeserta extends Notification
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hi Admin,')
            ->line('Berikut adalah rekod peserta baru.')
            ->line('Nama Peserta: ' . $this->data['nama_peserta'])
            ->line('EMail Peserta: ' . $this->data['email_peserta'])
            ->action('Notification Action', route('login'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'nama_peserta' => $this->data['nama_peserta'],
            'nama_program' => $this->data['nama_program'],
            'tarikh_mula' => $this->data['tarikh_mula'],
            'tarikh_akhir' => $this->data['tarikh_akhir'],
            'lokasi' => $this->data['lokasi']
        ];
    }
}
