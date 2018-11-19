<?php

namespace App\Service;

use App\Models\Task;
use App\Service\BaseService;
use App\Service\Interfaces\TaskInterface;

class TaskService extends BaseService implements TaskInterface
{


    public function getAll()
    {
        return $this->_model->get()->load('timesheet');
    }

}
