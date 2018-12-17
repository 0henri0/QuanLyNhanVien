<?php

namespace App\Service\Interfaces;

use App\Models\Timesheet;

interface TimesheetInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($timesheet);

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
    public function update(Timesheet $timesheet, array $attributes);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete(Timesheet $timesheet);
}
