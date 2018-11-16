<?php

namespace App\Service;

use App\Service\Interfaces\SystemInterface;
use App\Service\Eloquent;

class Systemmanager extends Eloquent implements SystemInterface
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
