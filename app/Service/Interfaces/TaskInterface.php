<?php

namespace App\Service\Interfaces;

use App\Models\Task;
use App\Models\Timesheet;

interface TaskInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll(Timesheet $timesheet);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find(Task $task);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update(Task $task, array $attributes);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete(Task $task);
}
