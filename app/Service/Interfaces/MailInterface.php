<?php

namespace App\Service\Interfaces;

interface MailInterface
{
    /**
     * send mail start timeshhet
     */
    public function emailStart();
    /**
     * send mail end timeshhet
     */
    public function emailEnd();
    /**
     * send mail timeshhet for leader
     */
    public function emailSendLeader($mail);
    /**
     * send mail thank
     */
    public function emailThank($mail);

}