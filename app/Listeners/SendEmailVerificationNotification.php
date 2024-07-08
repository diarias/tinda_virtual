<?php

namespace App\Listeners;


use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;


class SendEmailVerificationNotification
{

      /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // Accede al usuario utilizando el método 'user' en el evento 'Registered'
        $user = $event->user;
        $hash = sha1($user->email);

        // Envía el correo electrónico de verificación al usuario
         // Mail::to($user)->send(new VerificationEmail($user->id, $hash));
      //  Mail::to($user->email)->send(new VerificationEmail($user->id, $hash));
    }



    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
   /* public function handle(Registered $event): void
    {
        //
    }*/
}
