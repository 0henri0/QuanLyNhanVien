<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Service\Interfaces\WorkManagerInterface;

class WorkManagerController extends Controller
{
    protected $workManager;

    public function __construct(WorkManagerInterface $work)
    {
        $this->workManager = $work;
    }

    public function index()
    {
        $workManager = $this->workManager->getAll();

        return view('staff.workmanager.index',compact('workManager'));
    }
}
