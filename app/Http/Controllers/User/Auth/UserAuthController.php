<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    /**
     * dashboard show
     *
     * @return void
     */
    public function dashboard()
    {

        return view('userview.pages.frontpage');
    }
    /**
     * show login
     *
     * @return void
     */
    public function login()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->route('user.dashboard');
        }
        return view('userview.auth.login');
    }
    /**
     *login submit data controller
     *
     * @param Request $request
     * @return void
     */
    public function loginSubmit(Request $request)
    {

        $rules = [
            'email' => ['required'],
            'password' => ['required']
        ];

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['status' => true, 'url' => 'successfully login']);
        }
        return response()->json(['status' => false, 'msg' => 'Credentials Does Not Match', 'data' => $request->all()]);
    }
    /**
     * logout controller
     */

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('user/login');
    }
    public function registration()
    {

        return view('userview.auth.registration');
    }
    public function registrationSubmit(Request $request)
    {

        $rules = [

            "name"          => ['required'],
            "password"      => ['required'],
            "email"         => ['required'],
            "pnumber"       => ['required'],
            "address"       => ['required'],
            "lng"           => ['required'],
            "lat"           => ['required'],
            "fsize"         => ['required',]
        ];

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }
        $idcode = uniqid(rand(100000.999999), true);
        $data = [
            'user_unique_id' => $idcode,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->pnumber,
            'address' => $request->address,
            'lat' => $request->lat,
            'long' => $request->lng,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'family_size' => $request->fsize,
        ];
        $mdregistration = User::create($data);
        if ($mdregistration) {
            return response()->json(['status' => true, 'msg' => 'registration complete']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
}
