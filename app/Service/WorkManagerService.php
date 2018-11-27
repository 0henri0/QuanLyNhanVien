<?php

namespace App\Service;

use App\Models\Workmanager;
use App\Service\Interfaces\WorkManagerInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class WorkManagerService implements WorkManagerInterface
{

    public function getAll()
    {
        $date = Carbon::now()->format('Y') . '-0-0';

        return Workmanager::where('staff_id', Auth::id())->where('created_at', '>', $date)->with('staff')->get()->sortByDesc('date');
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($text1, $text2)
    {
        $data['date'] = Carbon::now()->format('Y-m-d');
        $data[$text1] = 1;
        $data[$text2] = 0;
        $data['staff_id'] = Auth::id();

        return Workmanager::create($data);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function updateRegister()
    {
        $work = Workmanager::where('staff_id', Auth::id())->where('date', '>=', Carbon::now()->format('m-Y'))->where('date', '<', Carbon::now()->addMonth())->first();
        if ($work) {
            $work['number_register'] += 1;
            $work->save();

            return $work;
        }

        return $this->create('number_register', 'number_late');
    }

    public function updateLate()
    {
        $work = Workmanager::where('staff_id', Auth::id())->where('date', '>=', Carbon::now()->format('m-Y'))->where('date', '<', Carbon::now()->addMonth())->first();
        if ($work) {
            $work['number_late'] += 1;
            $work->save();

            return $work;
        }

        return $this->create('number_late', 'number_register');
    }


}
