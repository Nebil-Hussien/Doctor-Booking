<?php

namespace App\Http\Controllers\User\Profile;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserprofileController extends Controller
{
    /**
     * EDIT PROFILE SHOW
     *
     */
    public function edit()
    {
        $profileData  = User::where('id', Auth::guard('user')->user()->id)->first();

        return view('userview.profile.edit', compact('profileData'));
    }
    /**
     * store EDIT PROFILE DATA
     */
    public function editSubmit(Request $request)
    {
        $rules = [];
        $oldData = user::where('id', Auth::guard('user')->user()->id)->first();
        if ($oldData->name != $request->name) {
            $data['name'] = $request->name;
        }
        if ($oldData->email != $request->email) {
            $rules['email'] = ['unique:users', 'string', 'email'];
            $data['email'] = $request->email;
        }
        if ($oldData->phone !== $request->phone) {

            $rules['phone'] = ['unique:users', 'min:10', 'max:10'];
            $data['phone'] = $request->phone;
        }
        if ($oldData->gender != $request->gender) {

            $data['gender'] = $request->gender;
        }
        if ($oldData->address != $request->address) {

            $data['address'] = $request->address;
            $data['lat'] = $request->lat;
            $data['long'] = $request->lng;
        }
        if ($oldData->family_size != $request->family_size && $request->family_size !== NULL) {

            $data['family_size'] = $request->family_size;
        }
        if ($request->hasFile('profile')) {
            $logoname = $request->file('profile')->getClientOriginalExtension();
            $random = substr(uniqid(), 0, 9) . '.' . $logoname;

            $data['profile'] = 'projectfolder/user/profile/' . $random;
            $request->file('profile')->move(public_path() . '/projectfolder/user/profile/', $random);
        }
        if ($oldData->dob != $request->dob) {

            $data['dob'] = $request->dob;
        }
        $data['state'] = $request->state;
        $data['city'] = $request->city;
        $data['country'] = $request->country;

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        };

        $updateMdProfile = user::where('id', Auth::guard('user')->user()->id)->update($data);
        if ($updateMdProfile) {
            Helper::addToActivities('PROFILE CHANGE SUCCESS  -' . Auth::guard('user')->user()->id, Auth::guard('user')->user()->id, 'USER', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => 'Update Successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
}
