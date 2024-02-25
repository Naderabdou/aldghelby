<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Dashboard\ProfileRequest;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = Auth::user();

        return view('dashboard.profile' , compact('user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = Auth::user();

        $data = $request->except('_token', '_method');

        // if ($request->password) {
        //     $data['password'] = \bcrypt($request->password);
        // } else {
        //     $data['password'] = $user->password;
        // }

        $user->update($data);

        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }

    public function updatePassword(Request $request){
        $request->validate(
            [
                'old_password' => 'required' ,
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]
            ,
            [
                'old_password.required' => 'يجب ادخال كلمة المرور القديمة',
                'password.required' => 'يجب ادخال كلمة المرور الجديدة',
                'confirm_password.required' => 'يجب ادخال تأكيد كلمة المرور الجديدة',
                'confirm_password.same' => 'كلمة المرور الجديدة غير متطابقة'
            ]
            );
            $user = Auth::user();
            if (Hash::check($request->old_password , $user->password )) {
                $user->update([
                    'password' => Hash::make( $request->password)
                ]);
                return \redirect()->back()->with('success', 'تم تغيير كلمة السر بنجاح');
            }else{
                return redirect()->back()->with('error' , 'كلمة المرور القديمة غير صحيحة')->withInput();            }

    }
}
