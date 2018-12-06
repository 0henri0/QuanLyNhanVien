<?php

namespace App\Service;

use App\Service\Interfaces\MailInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Staff;

class MailService implements MailInterface
{
    public function emailStart()
    {
        $user = Staff::with('timesheet')->get();
        foreach ($user as $item) {
            if (($item->timesheet->where('date', Carbon::today()->format('Y-m-d'))->isEmpty())) {
                Mail::send('mails.emailStart', array(), function ($message) use ($item) {
                    $message->to($item->email, 'Visitor')->subject('Visitor Feedback!');
                });
            }
        }
    }

    public function getStartTime()
    {
        try {

            return \App\Models\Systemmanager::first()->start_timesheet;
        } catch (\Exception $e) {
            return '17:00';
        }
    }

    public function getEndTime()
    {
        try {

            return \App\Models\Systemmanager::first()->end_timesheet;
        } catch (\Exception $e) {
            return '19:00';
        }
    }

    public function emailEnd()
    {
        $user = Staff::with('timesheet')->get();
        foreach ($user as $item) {
            if (($item->timesheet->where('date', Carbon::today()->format('Y-m-d'))->isEmpty())) {
                Mail::send('mails.emailEnd', array(), function ($message) use ($item) {
                    $message->to($item->email, 'Visitor')->subject('Visitor Feedback!');
                });
            }
        }
    }

    public function emailSendLeader($mail)
    {
        Mail::send('mails.emailSendLeader', array(), function ($message) use ($mail) {
            $message->to($mail, 'Visitor')->subject('Visitor Feedback!');
        });
    }

    public function emailThank($mail)
    {
        Mail::send('mails.emailThank', array(), function ($message) use ($mail){
            $message->to($mail, 'test')->subject('test!');
        });
    }
}
