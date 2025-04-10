<?php

namespace App\Http\Controllers\Mddoctor\Auth;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Mddoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;


class MdDoctorAuthController extends Controller
{
    /**
     * dashboard show
     *
     * @return void
     */
    public function dashboard()
    {
        return view('mdview.pages.frontpage');
    }
    /**
     * show login
     *
     * @return void
     */
    public function login()
    {
        if (Auth::guard('mddoctor')->check()) {
            return redirect()->route('md.dashboard');
        }
        return view('mdview.auth.login');
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

        if (Auth::guard('mddoctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Helper::addToActivities('LOGIN SUCCESS  -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');
            return response()->json(['status' => true, 'url' => 'successfully login']);
        }
        return response()->json(['status' => false, 'msg' => 'Credentials Does Not Match', 'data' => $request->all()]);
    }
    /**
     * logout controller
     */

    public function logout()
    {
        Auth::guard('mddoctor')->logout();
        return redirect('md/login');
    }
    /**
     * logout registration show
     */
    public function registration()
    {
        return view('mdview.auth.registration');
    }
    /**
     * logout registration submit
     */
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
            'md_unique_id' => $idcode,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->pnumber,
            'address' => $request->address,
            'lat' => $request->lat,
            'long' => $request->lng,
            'gender' => $request->gender,
            'password' => Hash::make($request->password)
        ];
        $mdregistration = Mddoctor::create($data);
        if ($mdregistration) {
            Helper::addToActivities('CHNAGE ADDRESS CHANGE SUCCESS  -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');
            return response()->json(['status' => true, 'msg' => 'registration complete']);
        } else {
            Helper::addToActivities('CHNAGE ADDRESS CHANGE FAILE  -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');
            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
    /**
     * booking status
     */
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
        $mdregistration = Mddoctor::where('id', $request->id)->update(['is_online' => $request->status]);
        if ($mdregistration) {
            Helper::addToActivities('ONLINE STATUS CHANGE SUCCESS  -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');
            return response()->json(['status' => true, 'msg' => 'Booing Status complete']);
        } else {
            Helper::addToActivities('ONLINCE STATUS CHANGE FAILE  -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');
            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
    /**
     * CHANGE PASSWORD
     */
    public function changepassword(Request $reuest)
    {
        return view('mdview.auth.changepassword');
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
        $id =  Auth::guard('mddoctor')->id();
        $data = Mddoctor::find($id);
        if ((!Hash::check($request->old_password, $data->password))) {
            return response()->json(['status' => false, 'msg' => 'Old password not matched.']);
        } else {

            $data->password = Hash::make($request->new_password);
            $data->save();
            Helper::addToActivities('CHNAGE ADDRESS CHANGE SUCCESS  -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => 'Success: Password change successfully']);
        }
    }
}
