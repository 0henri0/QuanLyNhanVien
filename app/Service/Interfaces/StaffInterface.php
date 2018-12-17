<?php

namespace App\Service\Interfaces;


use App\Models\Staff;

interface StaffInterface
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
    public function find(Staff $staff);

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
    public function update(Staff $staff, array $attributes);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete(Staff $staff);
}
