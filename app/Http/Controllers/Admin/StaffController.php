<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Interfaces\StaffInterface as staffs;
use App\Http\Requests\StaffCreateRequest;
use App\Http\Requests\StaffUpdate as StaffUpdateRequest;

class StaffController extends Controller
{
    protected $staff;

    public function __construct(staffs $staff)
    {
        $this->staff = $staff;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = $this->staff->getAll();
        return view('test', ['test' => $test]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test');
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
        $data['avatar']=createAvatar($request,'upload/avatar');
        $user = $this->staff->create($data);

        return redirect('admin/staffs')->with('notify', "create $user->username successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($this->staff->find($id));
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
    public function update(StaffUpdateRequest $request, $id)
    {
        $user = $this->staff->find($id);
        $data = $request->all();
        if (isset($data['email'])) {
            unset($data['email']);
        }
        $data['password'] = bcrypt($data['password']);
        $data['avatar']=updateAvatar($request,'upload/avatar',$user->avatar);
        $user = $this->staff->update($id,$data);

        return redirect('admin/staffs')->with('notify', "modify $user->username successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->staff->delete($id);

        return redirect('admin/staffs')->with('notify', "delete successful!");
    }
}
