<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use App\Service\Interfaces\SystemInterface as system;
use Illuminate\Support\Facades\Auth;

class SystemmanagerController extends Controller
{
    protected $system;

    public function __construct(system $system)
    {
        parent::__construct();
        $this->system = $system;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $system = $this->system->getInfo();

        return view('admin.system.system', ['system' => $system]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $system = $this->system->update($data);

        return redirect('admin/system')->with('notify', "config system successful!");
    }
}
