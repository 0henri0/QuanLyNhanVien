<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Staff\Controller;
use App\Service\Interfaces\StaffInterface as staffs;
use App\Service\Interfaces\TimesheetInterface as timesheet;

class LeaderController extends Controller
{
    protected $staff, $timesheet;

    public function __construct(timesheet $timesheet, staffs $staff)
    {
        parent::__construct();
        $this->staff = $staff;
        $this->timesheet = $timesheet;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leader = $this->staff->leaderManager();

        return view('staff.leader.list', compact('leader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data['approve'] = 1;
        $this->timesheet->leaderUpdate($id, $data);

        return redirect('leader')->with('notify', "accepted");
    }
}
