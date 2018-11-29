<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Service\Interfaces\StaffInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $staff;

    public function __construct(StaffInterface $staff)
    {
        $this->staff = $staff;
    }

    public function show()
    {

        return view('staff.profile.profile');
    }


    public function update(ProfileUpdateRequest $request)
    {
        $data = $request->all();

        if (isset($data['password-old'])) {
            if (!Hash::check($data['password-old'], Auth::user()->password)) {
                return redirect('profile')->with('error', "mật khẩu cũ sai.");
            }
            $data['password'] = bcrypt($data['password']);
        }
        if (isset($data['email'])) {
            unset($data['email']);
        }
        $data['avatar'] = updateAvatar($request, 'upload/avatar', Auth::user()->avatar);
        if (!$data['avatar']) {
            unset($data['avatar']);
        }
        $this->staff->update(Auth::user()->id, $data);

        return redirect('profile')->with('notify', "modify successful!");
    }
}
