<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Peserta;

class PendaftaranProgram extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    # public $peserta;
    protected $peserta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Peserta $peserta)
    {
        $this->peserta = $peserta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Jemputan menyertai program / kursus ' . $this->peserta->program->name )
        ->view('theme_peserta/email_pendaftaran')
        ->with([
            'nama_peserta' => $this->peserta->nama,
            'nama_program' => $this->peserta->program->name,
            'tarikh_mula' => $this->peserta->program->tarikh_mula,
            'tarikh_akhir' => $this->peserta->program->tarikh_akhir,
            'lokasi' => $this->peserta->program->lokasi,
            'bantuan_phone' => '0123456789',
            'bantuan_email' => 'support@aturcara.com',
            'pengurusan' => 'Pihak Pengurusan KKMM',
            'nama_aplikasi' => config('app.name'),
            'link_aplikasi' => env('APP_URL')
        ]);
    }
}
