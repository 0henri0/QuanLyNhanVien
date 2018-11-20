<?php

namespace App\Service;

use App\Models\Task;
use App\Service\Interfaces\TaskInterface;

class TaskService implements TaskInterface
{


    public function getAll()
    {
        return Task::with('timesheet')->get();
    }
    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = Task::with('timesheet')->find($id);

        return $result;
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
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
