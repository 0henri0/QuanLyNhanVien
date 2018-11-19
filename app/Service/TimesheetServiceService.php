<?php

namespace App\Service;

use App\Service\Interfaces\TimesheetInterface;
use App\Service\EloquentService;

class TimesheetService extends EloquentService implements TimesheetInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Timesheet::class;
    }

    public function getAll()
    {
        return $this->_model->get()->load('task')->toArray();
    }

}
