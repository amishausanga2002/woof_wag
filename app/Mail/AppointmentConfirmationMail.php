<?php

namespace App\Mail;

use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;

    public function __construct(Service $appointment)
    {
        $this->appointment = $appointment;
    }

    public function build()
    {
        return $this->subject('Your Appointment Confirmation')
                    ->view('emails.appointment_confirmation');
    }
}

