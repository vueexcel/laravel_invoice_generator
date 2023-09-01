<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SampleEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $attachmentPath; 

    public function __construct($data, $attachmentPath) 
    {
        $this->data = $data;
        $this->attachmentPath = $attachmentPath;
    }

    public function build()
    {
        return $this->view('emails.demo')
            ->attach($this->attachmentPath, [
                'as' => 'attachment.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}

