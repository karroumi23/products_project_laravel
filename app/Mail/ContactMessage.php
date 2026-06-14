<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public string $nomClient;
    public string $emailClient;
    public string $telephone;
    public string $sujet;
    public string $messageClient;

    public function __construct(array $data)
    {
        $this->nomClient     = $data['nom'];
        $this->emailClient   = $data['email'];
        $this->telephone     = $data['telephone'] ?? 'Non renseigné';
        $this->sujet         = $data['sujet'] ?? 'Sans sujet';
        $this->messageClient = $data['message'];
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📩 Nouveau message — ' . $this->sujet,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-message',
        );
    }
}