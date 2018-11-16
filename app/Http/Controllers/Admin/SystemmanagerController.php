<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Interfaces\SystemInterface as system;

class SystemmanagerController extends Controller
{
    protected $system;

    public function __construct(system $system)
    {
        $this->system = $system;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = $this->system->find(1);

        return view('test', ['test' => $test]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $system = $this->system->update(1,$data);

        return redirect('admin/system')->with('notify', "config system successful!");
    }
}
