<?php

namespace App\Http\Controllers\Mddoctor\Experiance;

use App\Http\Controllers\Controller;
use App\Models\Doctorseducationdetail;
use App\Models\Mddoctor;
use Illuminate\Http\Request;

class MdExperianceController extends Controller
{
    public function edit()
    {
        //  $profileData = Mddoctor::where('id',Auth::guard('mddoctor')->user()->id)->first();
        $eductiondetail = Doctorseducationdetail::where('doctor_id', Auth::guard('mddoctor')->user()->id)->where('type', 'md')->get();
        return view('mdview.qualification.edit', compact('eductiondetail'));
    }
    public function editSubmit(Request $request)
    {
        dd($request);
    }
}
