<?php

namespace App\Service;

use App\Service\Interfaces\StaffInterface;
use App\Service\Eloquent;

 class Staff extends Eloquent implements StaffInterface
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
        return $this->_model->get()->load('leader','staff');
    }

 }
