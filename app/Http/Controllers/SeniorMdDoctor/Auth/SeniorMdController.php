<?php

namespace App\Http\Controllers\SeniorMdDoctor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Seniormd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Helper\Helper;
use App\Models\Activitylog;
use Illuminate\Support\Facades\Hash;


class SeniorMdController extends Controller
{
    /**
     * dashboard show
     *
     * @return void
     */
    public function dashboard()
    {
        return view('seniormd.pages.frontpage');
    }
    /**
     * show login
     *
     * @return void
     */
    public function login()
    {
        if (Auth::guard('seniormd')->check()) {
            return redirect()->route('seniorMdDocotr.dashboard');
        }
        return view('seniormd.auth.login');
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

        if (Auth::guard('seniormd')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Helper::addToActivities('login  -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'url' => 'successfully login']);
        }
        return response()->json(['status' => false, 'msg' => 'Credentials Does Not Match', 'data' => $request->all()]);
    }
    /**
     * logout controller
     */

    public function logout()
    {
        Auth::guard('seniormd')->logout();
        return redirect('seniormd/login');
    }
    public function registration()
    {

        return view('seniormd.auth.registration');
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
        ];

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }
        $idcode = md5(uniqid(rand(), true));
        $data = [
            'senior_md_unique_id' => $idcode,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->pnumber,
            'address' => $request->address,
            'lat' => $request->lat,
            'long' => $request->lng,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ];
        $mdregistration = Seniormd::create($data);

        if ($mdregistration) {
            return response()->json(['status' => true, 'msg' => 'registration complete']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
    public function booking(Request $request)
    {
        $rules = [
            'id'      => 'required',
            'status' => 'required|in:0,1'
        ];
        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }
        Helper::addToActivities('online status change  -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');

        $mdregistration = Seniormd::where('id', $request->id)->update(['is_online' => $request->status]);
        if ($mdregistration) {
            return response()->json(['status' => true, 'msg' => 'Booing Status complete']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
    /**
     * CHANGE PASSWORD
     */
    public function changepassword(Request $reuest)
    {

        return view('seniormd.auth.changepassword');
    }
    /**
     * CHANGE PASSWORD STORE
     *
     */
    public function changepasswordSubmit(Request $request)
    {
        $rules = [
            'old_password' => ['required'],
            'new_password' => ['required'],
            'confirm_password' => ['required', 'string', 'min:6', 'same:new_password'],
        ];

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }
        $id =  Auth::guard('seniormd')->id();
        $data = Seniormd::find($id);
        if ((!Hash::check($request->old_password, $data->password))) {
            return response()->json(['status' => false, 'msg' => 'Old password not matched.']);
        } else {

            $data->password = Hash::make($request->new_password);
            $data->save();
            Helper::addToActivities('change password  -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => 'Success: Password change successfully']);
        }
    }
}
