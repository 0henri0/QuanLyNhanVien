<?php

namespace App\Service;

use App\Models\Task;
use App\Models\Timesheet;
use App\Service\Interfaces\TaskInterface;

class TaskService implements TaskInterface
{


    public function getAll(Timesheet $timesheet)
    {
        return $timesheet->task;
    }
    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find(Task $task)
    {

        return $task;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {

        return Task::create($attributes);
    }

    /**
     * Update
     * @param $task
     * @param array $attributes
     * @return bool|mixed
     */
    public function update(Task $task, array $attributes)
    {
        if ($task) {
            $task->update($attributes);
            return $task;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete(Task  $task)
    {
        if ($task) {
            $task->delete();

            return true;
        }

        return false;
    }
}
