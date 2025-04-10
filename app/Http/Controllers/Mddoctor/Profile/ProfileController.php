<?php

namespace App\Http\Controllers\Mddoctor\Profile;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Doctorseducationdetail;
use App\Models\Mddoctor;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * profile edit show
     */
    public function edit()
    {
        $profileData = Mddoctor::where('id', Auth::guard('mddoctor')->user()->id)->first();
        // $eductiondetail = Doctorseducationdetail::where('doctor_id', Auth::guard('mddoctor')->user()->id)->where('type', 'md')->get();
        return view('mdview.profile.edit', compact('profileData'));
    }
    /**
     * profile edit store
     */
    public function editSubmit(Request $request)
    {

        $rules = [];
        $oldData = Mddoctor::where('id', Auth::guard('mddoctor')->user()->id)->first();
        if ($oldData->name != $request->name) {
            $data['name'] = $request->name;
        }
        if ($oldData->email != $request->email) {
            $rules['email'] = ['unique:mddoctors', 'string', 'email'];
            $data['email'] = $request->email;
        }
        if ($oldData->phone !== $request->phone) {

            $rules['phone'] = ['unique:mddoctors', 'min:10', 'max:10'];
            $data['phone'] = $request->phone;
        }
        if ($oldData->gender != $request->gender) {

            $data['gender'] = $request->gender;
        }
        if ($oldData->biography != $request->biography && $request->biography !== NULL) {

            $data['biography'] = $request->biography;
        }
        if ($request->hasFile('profile')) {
            $logoname = $request->file('profile')->getClientOriginalExtension();
            $random = substr(uniqid(), 0, 9) . '.' . $logoname;

            $data['profile'] = 'projectfolder/md/profile/' . $random;
            $request->file('profile')->move(public_path() . '/projectfolder/md/profile/', $random);
        }
        if ($oldData->date_of_birth != $request->dob) {

            $data['date_of_birth'] = $request->dob;
        }

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        };
        $updateMdProfile = Mddoctor::where('id', Auth::guard('mddoctor')->user()->id)->update($data);
        if ($updateMdProfile) {
            Helper::addToActivities('PROFILE CHANGE SUCCESS  -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => 'Update Successfully']);
        } else {
            Helper::addToActivities('PROFILE CHANGE FAILE  -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
    /**
     * contact detail update show
     */
    public function editAddress()
    {
        $profileData = Mddoctor::where('id', Auth::guard('mddoctor')->user()->id)->first();
        // $eductiondetail = Doctorseducationdetail::where('doctor_id', Auth::guard('mddoctor')->user()->id)->where('type', 'md')->get();
        return view('mdview.contactus.edit', compact('profileData'));
    }
    /**
     * contact detail update store
     */
    public function editAddressSubmit(Request $request)
    {
        $data = [

            'address' => $request->address,
            'lat' => $request->lat,
            'long' => $request->lng,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
        ];

        $profileData = Mddoctor::where('id', Auth::guard('mddoctor')->user()->id)->update($data);
        if ($profileData) {
            Helper::addToActivities('PROFILE CHANGE FAILE  -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => 'Update Successfully']);
        } else {
            Helper::addToActivities('PROFILE CHANGE FAILE  -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
}
