<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\Interfaces\MailInterface as email;

class SendMailEndCommand extends Command
{
    protected $email;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:end';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(email $email)
    {
        parent::__construct();
        $this->email = $email;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->email->emailEnd();
    }
}
