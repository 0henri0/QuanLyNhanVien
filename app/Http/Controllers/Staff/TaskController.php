<?php

namespace App\Http\Controllers\Staff;

use App\Http\Requests\TaskRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Interfaces\TaskInterface as taskService;

class TaskController extends Controller
{
    protected $task;

    public function __construct(taskService $task)
    {
        $this->task = $task;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $task = $this->task->getAll($id);
        $timesheet = $id;

        return view('staff.task.list', compact('task','timesheet'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request, $id)
    {
        $data = $request->all();
        $data['timesheet_id'] = $id;
        $this->task->create($data);

        return redirect("timesheets/$id/tasks")->with('notify', "create task successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($this->task->find($id));

        return redirect('tasks')->with('notify', "delete successful!");
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
    public function update(TaskRequest $request, $taskId)
    {
        $data = $request->all();
        $this->task->update($taskId, $data);

        return back()->with('notify', "modify task successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->task->delete($id);

        return redirect('tasks')->with('notify', "delete successful!");
    }
}
