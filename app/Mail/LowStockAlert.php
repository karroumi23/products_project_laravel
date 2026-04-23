<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Collection;

class LowStockAlert extends Mailable
{
    use Queueable, SerializesModels;

    public Collection $products;

    public function __construct(Collection $products)
    {
        $this->products = $products;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '⚠️ Alerte Stock Faible — Aqualab Technologie',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.low-stock',
        );
    }
}