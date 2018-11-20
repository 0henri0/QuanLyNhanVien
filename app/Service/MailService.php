<?php

namespace App\Service;


use Illuminate\Support\Facades\Mail;

class MailService implements MailInterface
{
    public function emailStart($email)
    {
        Mail::send('mails.emailStart', array(), function ($message) use ($email) {
            $message->to($email, 'Visitor')->subject('Visitor Feedback!');
        });
    }

    public function emailEnd($email)
    {
        Mail::send('mails.emailEnd', array(), function ($message) use ($email) {
            $message->to($email, 'Visitor')->subject('Visitor Feedback!');
        });
    }

    public function emailSendLeader($email)
    {
        Mail::send('mails.emailSendLeader', array(), function ($message) use ($email) {
            $message->to($email, 'Visitor')->subject('Visitor Feedback!');
        });
    }

    public function emailThank($email)
    {
        Mail::send('mails.emailThank', array(), function ($message) use ($email) {
            $message->to($email, 'Visitor')->subject('Visitor Feedback!');
        });
    }
}
