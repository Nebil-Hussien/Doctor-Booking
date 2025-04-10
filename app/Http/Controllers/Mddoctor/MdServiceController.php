<?php

namespace App\Http\Controllers\Mddoctor;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Doctorservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MdServiceController extends Controller
{
    public function md_service_list()
    {
        $service = Service::get();
        $DoctorService = Doctorservice::where('md_id',  Auth::guard('mddoctor')->id())->get();
        $id = Auth::guard('mddoctor')->id();
        return view('mdview.mdservice.mdservice_list', compact('service', 'DoctorService', 'id'));
    }

    public function md_service_assigen(Request $request)
    {

        $savedata = 0;
        $deleteddata = Doctorservice::where('md_id', Auth::guard('mddoctor')->id())->delete();
        if (!is_null($request->service_id)) {
            foreach ($request->service_id as $key => $servies_id) {
                $data = new Doctorservice;

                $data->md_id = Auth::guard('mddoctor')->id();
                $data->service_id = $servies_id;
                $savedata = $data->save();
            }
        }
        if ($savedata || is_null($request->service_id)) {
            return response()->json(['status' => true, 'msg' => 'Service Assign Successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
        }
    }
}
