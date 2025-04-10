<?php

namespace App\Http\Controllers\SeniorMdDoctor\Education;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Doctorachievement;
use App\Models\Doctorregistration;
use App\Models\Doctorseducationdetail;
use App\Models\Doctorsexperiencedetail;
use App\Models\Seniormd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class SeniorMdEducationController extends Controller
{
    /**
     * education edit show
     */
    public function edit()
    {
        $userdetails = Seniormd::where('id', Auth::guard('seniormd')->user()->id)->first();
        $profileData = json_decode($userdetails->specilization);
        $registrationDetail = Doctorregistration::where('doctor_id', Auth::guard('seniormd')->user()->id)->where('type', 'seniormd')->get();
        $eductiondetail = Doctorseducationdetail::where('doctor_id', Auth::guard('seniormd')->user()->id)->where('type', 'seniormd')->get();
        return view('seniormd.qualification.edit', compact('eductiondetail', 'registrationDetail', 'profileData'));
    }
    /**
     * education edit store
     */
    public function editSubmit(Request $request)
    {

        $rules = [];
        $degree = [];
        $college = [];
        $year_of_completion = [];
        $registrationid = [];
        $year_of_registration = [];

        foreach ($request->degree as $key => $obj) {
            if (!is_null($obj)) {
                $degree[] = $obj;
            }
        }
        foreach ($request->college as $key => $obj) {
            if (!is_null($obj)) {
                $college[] = $obj;
            }
        }
        foreach ($request->year_of_completion as $key => $obj) {
            if (!is_null($obj)) {
                $year_of_completion[] = $obj;
            }
        }
        foreach ($request->registration as $key => $obj) {
            if (!is_null($obj)) {
                $registrationid[] = $obj;
            }
        }
        foreach ($request->year_of_registration as $key => $obj) {
            if (!is_null($obj)) {
                $year_of_registration[] = $obj;
            }
        }

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }
        $eductiondetail = Doctorseducationdetail::where('doctor_id', Auth::guard('seniormd')->user()->id)->where('type', 'seniormd')->delete();
        $flage = false;
        if (count($degree) > 0) {
            foreach ($degree as $key => $obj) {
                $data = [
                    'doctor_id' => Auth::guard('seniormd')->user()->id,
                    'type' => 'seniormd',
                    'degree' => $obj,
                    'college' => $college[$key],
                    'year_of_completion' => $year_of_completion[$key],
                ];
                $eductiondetail = Doctorseducationdetail::create($data);
                if (!$eductiondetail) {
                    return response()->json(['status' => false, 'msg' => 'Some thing went wrong Education ']);
                }


                $flage = true;
            };
        } else {
            $flage = true;
        }
        $reqflage = false;
        if (count($registrationid) > 0) {
            $eductiondetail = Doctorregistration::where('doctor_id', Auth::guard('seniormd')->user()->id)->where('type', 'seniormd')->delete();
            foreach ($registrationid as $key => $obj) {
                $data = [
                    'doctor_id' => Auth::guard('seniormd')->user()->id,
                    'type' => 'seniormd',
                    'registrationid' => $obj,
                    'year_of_registration' => $year_of_registration[$key],
                ];
                $eductiondetail = Doctorregistration::create($data);
                if (!$eductiondetail) {
                    Helper::addToActivities('DOCOTOR REGISTRATION FAIL  -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');

                    return response()->json(['status' => false, 'msg' => 'Some thing went wrong Education ']);
                }
                $reqflage = true;
            }
        } else {
            $reqflage = true;
        }
        if (!empty($request->specialist)) {
            $profileData = Seniormd::where('id', Auth::guard('seniormd')->user()->id)->update(['specilization' => json_encode($request->specialist)]);
        }
        if ($flage == true && $reqflage == true) {
            Helper::addToActivities('REGISTRATION SUCCESS -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => 'Form submit success fully complete']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
    /**
     * awards edit show
     */
    public function editAchievement()
    {
        $userdetails = Seniormd::where('id', Auth::guard('seniormd')->user()->id)->first();

        $expericanceDetail = Doctorsexperiencedetail::where('doctor_id', Auth::guard('seniormd')->user()->id)->where('type', 'seniormd')->get();
        $awards = Doctorachievement::where('doctor_id', Auth::guard('seniormd')->user()->id)->where('type', 'seniormd')->get();
        return view('seniormd.achievement.achievement', compact('expericanceDetail', 'awards'));
    }
    /**
     * awards edit data
     */
    public  function editAchievementSubmit(Request $request)
    {
        // dd($request);
        $designation = $request->designation;
        $to = $request->to;
        $from = $request->from;
        $flage = false;
        $flage1 = false;
        $eductiondetail = Doctorsexperiencedetail::where('doctor_id', Auth::guard('seniormd')->user()->id)->where('type', 'seniormd')->delete();
        if (count($designation) > 0) {
            foreach ($request->hospital_name as $key => $obj) {
                $data = [
                    'doctor_id' => Auth::guard('seniormd')->user()->id,
                    'type' => 'seniormd',
                    'hospital_name' => $obj,
                    'designation' => $designation[$key],
                    'to' => $to[$key],
                    'from' => $from[$key],
                ];

                $eductiondetail = Doctorsexperiencedetail::create($data);
                if (!$eductiondetail) {
                    Helper::addToActivities('ACHIEVEMENT CHANGE FAILE   -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');
                    return response()->json(['status' => false, 'msg' => 'Some thing went wrong Education ']);
                }
                $flage = true;
            }
        } else {
            $flage = true;
        }
        $achievementDelete = Doctorachievement::where('doctor_id', Auth::guard('seniormd')->user()->id)->where('type', 'seniormd')->delete();
        if (count($request->award_name) > 0) {

            foreach ($request->award_name as $key => $obj) {
                $data1 = [
                    'doctor_id' => Auth::guard('seniormd')->user()->id,
                    'type' => 'seniormd',
                    'award_name' => $obj,
                    'award_year' => $request->award_year[$key],
                ];

                $eductiondetail = Doctorachievement::create($data1);
                if (!$eductiondetail) {
                    Helper::addToActivities('ACHIEVEMENT CHANGE FAILE  -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');
                    return response()->json(['status' => false, 'msg' => 'Some thing went wrong Education ']);
                }
                $flage1 = true;
            }
        } else {
            $flage1 = true;
        }
        if ($flage == true &&  $flage1 = true) {
            Helper::addToActivities('ACHIEVEMENT CHANGE SUCCESS  -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');
            return response()->json(['status' => true, 'msg' => 'Form submit success fully complete']);
        } else {
            Helper::addToActivities('CHANGE ACHIEVEMENT FAIL  -' . Auth::guard('seniormd')->user()->id, Auth::guard('seniormd')->user()->id, 'SENIORMD', $request->fullUrl(), $request->ip(), 'POST');
            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
}
