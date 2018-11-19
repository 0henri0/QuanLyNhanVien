<?php

namespace App\Service;

use App\Models\Timesheet;
use App\Service\Interfaces\TimesheetInterface;
use App\Service\BaseService;

class TimesheetService extends BaseService implements TimesheetInterface
{

    public function __construct(Timesheet $timesheet)
    {
        $this->_model = $timesheet;
    }

    public function getAll()
    {
        return $this->_model->get()->load('task')->toArray();
    }

}
