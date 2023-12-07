<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $from_message;

    /**
     * Create a new from_message instance.
     *
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param string $from_message
     * @return void
     */
    public function __construct($name, $email, $phone, $from_message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->from_message = $from_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.contacts_email')
            ->from($this->email)
            ->to('laFiesta@contact.com')
            ->subject('LA FIESTA CONTACTS FROM'.$this->name)
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'from_message' => $this->from_message
            ]);
    }
}
