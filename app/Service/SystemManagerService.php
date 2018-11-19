<?php

namespace App\Service;

use App\Models\Systemmanager;
use App\Service\Interfaces\SystemInterface;

class SystemManagerService implements SystemInterface
{

    /**
     * Get getInfo
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getInfo()
    {
        $result = Systemmanager::first();

        return $result;
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update(array $attributes)
    {
        $result = $this->getInfo();
        //dd($result->id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }
}
