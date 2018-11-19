<?php

namespace App\Service;

use App\Service\Interfaces\SystemInterface;
use App\Service\EloquentService;

class SystemmanagerService extends EloquentService implements SystemInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Systemmanager::class;
    }
}
