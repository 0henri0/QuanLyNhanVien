<?php

namespace App\Service\Interfaces;

interface SystemInterface
{
    /**
     * Get Info
     * @return mixed
     */
    public function getInfo();

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update(array $attributes);

}
