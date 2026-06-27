<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public Contact $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('New Contact Message - NeoMed')
            ->replyTo($this->contact->email, $this->contact->name)
            ->view('emails.new-contact')
            ->with([
                'contactName' => $this->contact->name,
                'contactEmail' => $this->contact->email,
                'contactMessage' => $this->contact->message,
            ]);
    }
}
