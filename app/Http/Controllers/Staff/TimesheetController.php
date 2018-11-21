<?php

namespace App\Http\Controllers\Staff;

use App\Http\Requests\TimesheetCreateRequest;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Service\Interfaces\TimesheetInterface as timesheet;
use App\Jobs\SendThankEmail;
use App\Jobs\SendLeaderMail;
use App\Service\Interfaces\MailInterface as mail;

class TimesheetController extends Controller
{
    protected $timesheet, $mail;

    public function __construct(timesheet $timesheet, mail $mail)
    {
        $this->timesheet = $timesheet;
        $this->mail = $mail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = $this->timesheet->getAll();

        return view('test', ['test' => $test]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data['date'] = Carbon::parse($data['date'])->format('Y-m-d');
        $this->timesheet->create($data);

        dispatch(new SendThankEmail($this->mail));
        return redirect('timesheets')->with('notify', "create timesheet successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($this->timesheet->find($id));

        return redirect('timesheets')->with('notify', "delete successful!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimesheetCreateRequest $request, $id)
    {
        $data = $request->all();
        if (isset($data['date'])) {
            unset($data['date']);
        }
        $data['approve'] =0;
        $this->timesheet->update($id, $data);
        dispatch(new SendLeaderMail($this->mail));

        return redirect('timesheets')->with('notify', "modify timesheet successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->timesheet->delete($id);

        return redirect('timesheets')->with('notify', "delete successful!");
    }
}
