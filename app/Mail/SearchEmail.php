<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SearchEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $search_result;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($search_result)
    {
        $this->search_result = $search_result;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.search_result');
    }
}
