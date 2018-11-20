<?php

namespace App\Service\Interfaces;

interface MailInterface
{
    /**
     * send mail start timeshhet
     */
    public function emailStart($email);
    /**
     * send mail end timeshhet
     */
    public function emailEnd($email);
    /**
     * send mail timeshhet for leader
     */
    public function emailSendLeader($email);
    /**
     * send mail thank
     */
    public function emailThank($email);

}