<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimesheetCreateRequest extends FormRequest
{
    protected $redirect = "timesheets";

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|unique:timesheets',
            'difficulty' => 'required',
            'work_next_day' => 'required',
            'staff_id'=>'required',
        ];
    }
}
