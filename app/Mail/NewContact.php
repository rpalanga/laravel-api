<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;
     //per avere un oggetto in cui memorizzeremo le info del form compilato dall'utente
     //essendo public sarà disponibile in tutti i file laravel
     public $lead;
    /**
     * Create a new message instance.
     */
    public function __construct($lead)
    {
        //riempiamo la variabile di istanza col poarametro che passeremo 
        //quando si crea un nuovo leads(contatto)

       $this->lead = $lead;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            //quando risponderemo alla mail contatteremo l'utente
            replyTo: $this->lead->address,
            subject: 'Nuova richiesta di contatto',
        );
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.new-contact ',
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
