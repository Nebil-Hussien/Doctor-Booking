<?php

namespace App\Http\Controllers\Admin\SeniorMdDoctor;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Doctorseducationdetail;
use App\Models\Seniormd;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class SeniorDoctorListController extends Controller
{
    public function show()
    {
        $disbar = 'registration.seniormddoctor';
        return view('admin.register.seniormddoctor.seniormdlist', compact('disbar'));
    }
    public function ajaxlist(Request $request)
    {
        if (isset($request->search['value'])) {
            $search = $request->search['value'];
        } else {
            $search = '';
        }

        if (isset($request->length)) {
            $limit = $request->length;
        } else {
            $limit = 10;
        }

        if (isset($request->start)) {
            $ofset = $request->start;
        } else {
            $ofset = 0;
        }
        $orderType = $request->order[0]['dir'];
        $nameOrder = $request->columns[$request->order[0]['column']]['name'];


        $total = Seniormd::get()->count();
        $bookings = Seniormd::orWhere(function ($query) use ($search) {
            $query->orWhere('name', 'like', '%' . $search . '%');
        })
            ->get();

        $i = 1 + $ofset;
        $data = [];
        foreach ($bookings as $books) {
            $userprofile = '<a href="' . url('admin/seniormdprofile/' . base64_encode($books->id)) . '" target="_blank" class="btn btn-info  badge-info "><i class="fa fa-user-circle-o"></i></a>';

            $useraccess = '<a href="' . url('admin/seniormddoctor_access/' . base64_encode($books->id)) . '" target="_blank" class="btn btn-danger"><i class="fa fa-universal-access"></i></a>';
            $status = '<button class="status_item btn-sm btn ' . ($books->status == 1 ? "btn-success" : "btn-danger") . '  " data-status="' . ($books->status == 1  ? '0' : '1') . '" data-id="' . $books->id . '">' . ($books->status == 1 ? "Active" : "De-Active") . '</button>';
            $data[] = array(
                $i++,
                $books->name,
                '<img src="' . url('public/' . $books->profile) . '" style="height:50px;border-radius:10px;">',
                $status,
                $useraccess,
                $userprofile,
                ' <a href="#" class="btn btn-success btn-sm   edit_item" data-id = "' . $books->id . '" data-name = "' . $books->name . '" data-image ="' . $books->photo . '"><i class="fe fe-pencil"></i></a>
                <a href="#" class="btn btn-danger btn-sm   delete_item"data-id = "' . $books->id . '" data-name = "' . $books->name . '" ><span class="fe fe-trash"></span></a>',


            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }
    public function seniormddoctorpanelaccess(Request $request)
    {
        $uniqueId = base64_decode($request->id);
        if (Auth::guard('seniormd')->loginUsingId(['id' => $uniqueId])) {
            Helper::addToActivities('VIEW PROFILE OF SENIORMD  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');
            return redirect()->intended('seniormd/dashboard');
        } else {
            return response()->json(array('status' => false, 'msg' => "Credentials not matched !"));
            exit;
        }
    }
    public function status(Request $request)
    {
        $rules = [
            'id' => ['required', 'exists:seniormds']
        ];

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }
        $data = ['status' => $request->status];
        $updatedata = Seniormd::where('id', $request->id)->update($data);
        if ($updatedata) {
            Helper::addToActivities('CHANGE OF STATUS SENIORMD SUCCESS-' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => " Staus Change Successfully"]);
            exit;
        } else {
            Helper::addToActivities('CHANGE OF STATUS SENIORMD FAILE  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
            exit;
        }
    }
    public function delete(Request $request)
    {
        $rules = [
            'id' => ['required', 'exists:seniormds']
        ];

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }

        $updatedata = Seniormd::where('id', $request->id)->delete();
        if ($updatedata) {
            Helper::addToActivities('delete PROFILE OF SENIORMD SUCCESS  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => " Senior Medical Doctor Delete Successfully"]);
            exit;
        } else {
            Helper::addToActivities('delete PROFILE OF SENIORMD FAILE -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
            exit;
        }
    }
    public function profile(Request $request)
    {
        $disbar = 'registration.seniormddoctor';
        $uniqueId = base64_decode($request->id);
        $details = Seniormd::where('id', $uniqueId)->first();
        $specilisation = json_decode($details->specilization);
        $educatioDetails = Doctorseducationdetail::where('doctor_id', $uniqueId)->get();
        return view('admin.register.seniormddoctor.profile', compact('disbar', 'details', 'educatioDetails', 'specilisation'));
    }
}
