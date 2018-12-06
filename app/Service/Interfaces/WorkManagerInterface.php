<?php

namespace App\Service\Interfaces;

interface WorkManagerInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * @param $text1
     * @param $text2
     * @return mixed
     */
    public function create($text1, $text2);

    /**
     * @return mixed
     */
    public function updateRegister();

    /**
     * @return mixed
     */
    public function updateLate();
}
