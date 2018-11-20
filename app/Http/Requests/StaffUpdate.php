<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffUpdate extends FormRequest
{
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
            'usename' => 'min:3',
            'avatar' => 'file|image|mimes:jpeg,jpg',
            'password' => 'min:6|max:32',
            'passwordAgain' => 'same:password',
        ];
    }

    /**
     * send notification value in form fail
     * @return array
     */
    public function messages()
    {
        return [
            'usename.min' => 'You must enter more than 3 characters',
            'avatar.image' => 'not support img',
            'password' => 'min 6 and max 32 characters for password',
            'passwordAgain.same'=> 'password again not same password'
        ];
    }
}
