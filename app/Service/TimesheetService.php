<?php

namespace App\Service;

use App\Models\Timesheet;

;

use App\Service\Interfaces\TimesheetInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TimesheetService implements TimesheetInterface
{

    public function getAll()
    {
        $timesheet = Auth::user()->load('timesheet')->timesheet();

        return $timesheet->whereYear('date', Carbon::now()->format('Y'))->whereMonth('date', Carbon::now()->format('m'))->get()->sortByDesc('date');
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
        $check = Carbon::parse($attributes['date'])->format('d-m-Y')<= Carbon::now()->format('d-m-Y');

        if (Timesheet::where('staff_id', Auth::user()->id)->where('date', $attributes['date'])->first() || !$check) {

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
        $check2 = Carbon::parse($attributes['date'])->format('m-Y') == Carbon::now()->format('m-Y');
        $check = Timesheet::where('staff_id', Auth::id())->where('date', $attributes['date'])->first();
        if (($result->date == $attributes['date'] || !$check) && $check2) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function leaderUpdate($id, array $attributes)
    {
        $result = $this->find($id);
        $result->update($attributes);

        return $result;

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
