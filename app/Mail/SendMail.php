<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Staff;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $viewMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($viewMail)
    {
        $this->viewMail = $viewMail;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->viewMail);
    }
}
