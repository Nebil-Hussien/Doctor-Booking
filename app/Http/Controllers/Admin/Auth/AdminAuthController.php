<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminAuthController extends Controller
{
    /**
     * login show controller
     */

    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin/auth/login');
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
            'email' => ['required',],
            'password' => ['required']
        ];

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            Helper::addToActivities('LOGIN SUCCESS  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'url' => 'successfully login']);
        }
        return response()->json(['status' => false, 'msg' => 'Credentials Does Not Match', 'data' => $request->all()]);
    }
    /**
     * Admin dashboard controller
     *
     * @return void
     */
    public function dashboard()
    {
        $disbar = 'admin.dashboard';
        return view('admin/dashboard/dashboard', compact('disbar'));
    }
    /**
     * logout controller
     */

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    /**
     * forget password show controller
     */
    public function changepassword()
    {
        return View('admin.auth.changepassword');
    }
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
        $id =  Auth::guard('admin')->id();
        $data = Admin::find($id);
        if ((!Hash::check($request->old_password, $data->password))) {

            Helper::addToActivities('PASSWORD CHANGE FAILE  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => false, 'msg' => 'Old password not matched.']);
        } else {

            $data->password = Hash::make($request->new_password);
            $data->save();
            Helper::addToActivities('PASSWORD CHANGE SUCCESS  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => 'Success: Password change successfully']);
        }
    }
}
