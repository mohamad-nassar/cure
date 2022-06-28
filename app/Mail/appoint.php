<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class appoint extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $department=$this->data['department'];
        $doctor=$this->data['doctor'];
        $status=$this->data['status'];
        $date=$this->data['date'];
        $name=$this->data['name'];
        $email=$this->data['email'];
        $phone=$this->data['phone'];
        $msg=$this->data['msg'];
        return $this->view('emails.appoint',compact('department','doctor','status','date','name','email','phone','msg'))->subject('New Appointment');
    }
}
