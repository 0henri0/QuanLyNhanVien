<?php

namespace App\Service;

use App\Service\Interfaces\StaffInterface;
use App\Service\EloquentService;

 class StaffService extends EloquentService implements StaffInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Staff::class;
    }

    public function getAll()
    {
        dd($this->_model);
        return $this->_model->get()->load('leader','staff');
    }

 }
