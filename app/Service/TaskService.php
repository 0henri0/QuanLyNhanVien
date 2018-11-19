<?php

namespace App\Service;

use App\Service\EloquentService;
use App\Service\Interfaces\TaskInterface;

class TaskService extends EloquentService implements TaskInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Task::class;
    }

    public function getAll()
    {
        return $this->_model->get()->load('timesheet');
    }

}
