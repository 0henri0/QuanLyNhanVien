<?php

namespace App\Service;

use App\Models\Timesheet;;
use App\Service\Interfaces\TimesheetInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TimesheetService implements TimesheetInterface
{

    public function getAll()
    {
        $timesheet = Auth::user()->load('timesheet');
        $mouth = Carbon::now()->startOfMonth()->format('Y-m-d');

        return $timesheet->timesheet->where('date', '>=', $mouth)->sortByDesc('date');
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = Timesheet::with('task')->find($id);

        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        //dd(Carbon::now()->format('m-Y'));
        $check = Carbon::parse($attributes['date'])->format('m-Y') == Carbon::now()->format('m-Y');

        if (Timesheet::where('staff_id', Auth::id())->where('date', $attributes['date'])->first() || !$check) {

            return false;
        }
        return Timesheet::create($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

}
