<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\Interfaces\MailInterface as email;
use App\Service\WorkManagerService as workManager;

class SendMailEndCommand extends Command
{
    protected $email, $workManager;
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
    public function __construct(email $email, workManager $workManager)
    {
        parent::__construct();
        $this->email = $email;
        $this->workManager = $workManager;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->email->emailEnd();
        $this->workManager->getAll();
    }
}
