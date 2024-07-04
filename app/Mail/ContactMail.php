<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $email;
    public $pesan;

    public function __construct($nama, $email, $pesan)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->pesan = $pesan;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->view('contact')
            ->subject('Pesan dari form kontak');
        
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
