<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$title,$description,$data = NULL)
    {
        $this->subject = $subject;
        $this->title = $title;
        $this->description = $description;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
        ->view('admin.pages.email.notification')
        ->subject($this->subject)
        ->with(
         [
             'title' => $this->title,
             'description' => $this->description,
             'subject' => $this->subject,
             'data' => $this->data
         ]);
    }
}
