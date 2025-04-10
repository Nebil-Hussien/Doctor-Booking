<?php

namespace App\Http\Controllers\SeniorMdDoctor\Profile;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Seniormd;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class ProfileSeniorMdController extends Controller
{
    /**
     * profile edit show
     */
    public function edit()
    {
        $profileData = Seniormd::where('id', Auth::guard('seniormd')->user()->id)->first();
        // $eductiondetail = Doctorseducationdetail::where('doctor_id', Auth::guard('seniormd')->user()->id)->where('type', 'md')->get();
        return view('seniormd.profile.edit', compact('profileData'));
    }
    /**
     * profile edit store
     */
    public function editSubmit(Request $request)
    {

        $rules = [];
        $oldData = seniormd::where('id', Auth::guard('seniormd')->user()->id)->first();
        if ($oldData->name != $request->name) {
            $data['name'] = $request->name;
        }
        if ($oldData->email != $request->email) {
            $rules['email'] = ['unique:seniormds', 'string', 'email'];
            $data['email'] = $request->email;
        }
        if ($oldData->phone !== $request->phone) {

            $rules['phone'] = ['unique:seniormds', 'min:10', 'max:10'];
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
        $updateMdProfile = seniormd::where('id', Auth::guard('seniormd')->user()->id)->update($data);
        if ($updateMdProfile) {
            Helper::addToActivities('CHANGE PROFILE CHNAGE SUCCESS  -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => 'Update Successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
    /**
     * contact detail update show
     */
    public function editAddress()
    {
        $profileData = seniormd::where('id', Auth::guard('seniormd')->user()->id)->first();
        // $eductiondetail = Doctorseducationdetail::where('doctor_id', Auth::guard('seniormd')->user()->id)->where('type', 'md')->get();
        return view('seniormd.contactus.edit', compact('profileData'));
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

        $profileData = seniormd::where('id', Auth::guard('seniormd')->user()->id)->update($data);
        if ($profileData) {
            Helper::addToActivities('CHANGE ADDRESS CHANGE SUCCESS  -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => 'Update Successfully']);
        } else {
            Helper::addToActivities('CHANGE ADDRESS CHANGE FAILE  -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
}
