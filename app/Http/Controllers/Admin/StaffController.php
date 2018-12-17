<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Service\Interfaces\StaffInterface as staffs;
use App\Http\Requests\StaffCreateRequest;
use App\Http\Requests\StaffUpdate as StaffUpdateRequest;
use Illuminate\Support\Facades\Redirect;

class StaffController extends Controller
{
    protected $staff;

    public function __construct(staffs $staff)
    {
        parent::__construct();
        $this->staff = $staff;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = $this->staff->getAll();

        return view('admin.staff.list', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = $this->staff->getAll();

        return view('admin.staff.create',compact('staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffCreateRequest $request)
    {

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['avatar'] = 'upload/avatar/1.jpg';
        $user = $this->staff->create($data);

        return redirect('admin/staffs')->with('notify', "create $user->username successful!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $staff = $this->staff->find($staff);
        $staff1 = $this->staff->getAll();
        if (!$staff) {
            return redirect()->back()->withErrors(['staff do not exist']);
        }

        return view('admin.staff.edit', compact('staff','staff1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffUpdateRequest $request, Staff $staff)
    {
        $user = $this->staff->find($staff);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = $this->staff->update($staff, $data);

        return redirect('admin/staffs')->with('notify', "modify $user->username successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $this->staff->delete($staff);

        return redirect('admin/staffs')->with('notify', "delete successful!");
    }
}
