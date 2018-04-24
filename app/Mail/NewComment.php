<?php

namespace App\Mail;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\Users\comments;
class NewComment extends Mailable
{
    use Queueable, SerializesModels;
    public $comment;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(comments $comment)
    {
        $this->comment = $comment->comment;
        $this->email = $comment->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new.newComment');
    }
}
