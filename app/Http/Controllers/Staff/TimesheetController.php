<?php

namespace App\Http\Controllers\Staff;

use App\Http\Requests\TimesheetCreateRequest;
use App\Service\Interfaces\WorkManagerInterface;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Service\Interfaces\TimesheetInterface as timesheet;
use App\Jobs\SendThankEmail;
use App\Jobs\SendLeaderMail;
use App\Service\Interfaces\MailInterface as mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimesheetController extends Controller
{
    protected $timesheet, $mail, $work;

    public function __construct(timesheet $timesheet, mail $mail, WorkManagerInterface $work)
    {
        $this->timesheet = $timesheet;
        $this->mail = $mail;
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
        // dd($timesheet);
        return view('staff.timesheet.list', ['timesheet' => $timesheet]);
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
        $data['date'] = Carbon::parse($data['date'])->format('Y-m-d');

        if (!$this->timesheet->create($data)) {

            return redirect('timesheets')->with('notify', "timesheet exist or timesheet not in mouth now!");
        }
        $this->work->updateRegister();
        dispatch(new SendThankEmail($this->mail));
        dispatch(new SendLeaderMail($this->mail));

        return redirect('timesheets')->with('notify', "create timesheet successful!");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timesheet = $this->timesheet->find($id);

        return view('staff.timesheet.edit', compact('timesheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if (isset($data['date'])) {
            unset($data['date']);
        }
        $data['approve'] = 0;
        $this->timesheet->update($id, $data);
        dispatch(new SendLeaderMail($this->mail));

        return redirect('timesheets')->with('notify', "modify timesheet successful!");
    }

}
