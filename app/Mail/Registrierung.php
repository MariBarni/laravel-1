<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Profile;
use Illuminate\Support\Facades\URL;



class Registrierung extends Mailable
{
    use Queueable, SerializesModels;
    public $plaintextToken;
    public $expiresAt;

    /**
     * Create a new message instance.
     */
    public function __construct($plaintextToken, $expiresAt)
    {
      $this->plaintextToken = $plaintextToken;
      $this->expiresAt = $expiresAt;
    }
  
    public function build()
    {
      return $this->subject(
        config('app.name') . ' Login Verification'
      )->markdown('emails.registrierung', [
        'url' => URL::temporarySignedRoute('verify-login', $this->expiresAt, [
          'token' => $this->plaintextToken,
        ]),'token' => $this->plaintextToken,'expires_at'=>$this->expiresAt,
      ]);
    }

   

  
}
