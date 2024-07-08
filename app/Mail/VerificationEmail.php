<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $id;
    public $hash;

    public function __construct($id, $hash)
    {
        $this->id = $id;
        $this->hash = $hash;

      //  dd($id, $hash);
    }
    public function build()
    {
        return $this->markdown('mail.verification'); // Nombre de tu plantilla de correo electrónico
    }
}
