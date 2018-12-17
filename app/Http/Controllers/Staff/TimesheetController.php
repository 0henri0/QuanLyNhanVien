<?php

namespace App\Http\Controllers\Staff;

use App\Http\Requests\TimesheetCreateRequest;
use App\Http\Controllers\Staff\Controller;
use App\Models\Timesheet;
use App\Service\Interfaces\TimesheetInterface;
use App\Jobs\SendThankEmail;
use App\Jobs\SendLeaderMail;
use App\Service\WorkManagerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimesheetController extends Controller
{
    protected $timesheet, $work;

    public function __construct(TimesheetInterface $timesheet, WorkManagerService $work)
    {
        parent::__construct();
        $this->timesheet = $timesheet;
        $this->work = $work;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timesheet = $this->timesheet->getAll();

        return view('staff.timesheet.list', compact('timesheet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.timesheet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimesheetCreateRequest $request)
    {

        $data = $request->all();
        $data['staff_id'] = Auth::user()->id;
        if (!$this->timesheet->create($data)) {

            return redirect('timesheets')->with('notify', "timesheet exist or timesheet not in mouth now!");
        }
        $this->work->updateRegister();
        dispatch(new SendThankEmail(Auth::user()->email));
        if (Auth::user()->leader) {
            dispatch(new SendLeaderMail(Auth::user()->email));
        }

        return redirect('timesheets')->with('notify', "create timesheet successful!");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Timesheet $timesheet)
    {
        return view('staff.timesheet.edit', compact('timesheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timesheet $timesheet)
    {
        $data = $request->all();
        $data['approve'] = 0;
        if ($this->timesheet->update($timesheet, $data)) {
            dispatch(new SendLeaderMail(Auth::user()->leader()->first()->email));

            return redirect('timesheets')->with('notify', "modify timesheet successful!");
        } else {

            return redirect('timesheets')->with('error', "update not successful!");
        }

    }

}
