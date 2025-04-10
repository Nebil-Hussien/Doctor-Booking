<?php

namespace App\Http\Controllers\Admin\ApprovalController\MdDoctor;


use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Doctorseducationdetail;
use App\Models\Mddoctor;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class ApprovalMdController extends Controller
{
    public function show()
    {
        $disbar = 'approval.mddoctor';
        return view('admin.approval.mddoctor.mdlist', compact('disbar'));
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


        $total = Mddoctor::get()->count();
        $bookings = Mddoctor::orWhere(function ($query) use ($search) {
            $query->orWhere('name', 'like', '%' . $search . '%');
        })
            ->get();

        $i = 1 + $ofset;
        $data = [];
        foreach ($bookings as $books) {
            $userprofile = '<a href="' . url('admin/approval/mdprofile/' . base64_encode($books->id)) . '" target="_blank" class="btn btn-info  badge-info "><i class="fa fa-user-circle-o"></i></a>';
            $parked = '<button class=" btn-sm btn ' . ($books->approval_by_smd == 'pending'  ? "btn  btn-outline-warning status_item" : ($books->approval_by_smd == 'parked' ? "text-primary" : "")) . '  " data-status="' . ($books->approval_by_smd ==  'pending'  ? 'parked' : '"') . '" data-id="' . $books->id . '">' . ($books->approval_by_smd == 'pending' ? "Park" : ($books->approval_by_smd == 'parked' ? "Parked" : ""))  . '</button>';

            $reject = '<button class=" btn-sm btn ' . (($books->approval_by_smd == 'pending' || $books->approval_by_smd == 'parked') ? "btn  btn-outline-success status_item" : ($books->approval_by_smd == 'approved' ? "text-success" : "")) . '  " data-status="' . ($books->approval_by_smd ==  'pending' || $books->approval_by_smd == 'parked' ? 'approved' : '') . '" data-id="' . $books->id . '">' . ($books->approval_by_smd == 'pending' || $books->approval_by_smd == 'parked' ? "Approve" : ($books->approval_by_smd == 'approved' ? "Approved" : "")) . '</button>';
            $approve = '<button class=" btn-sm btn ' . (($books->approval_by_smd == 'pending' || $books->approval_by_smd == 'parked') ? "btn  btn-outline-danger status_item" : ($books->approval_by_smd == 'rejected' ? "text-danger" : "")) . '  " data-status="' . ($books->approval_by_smd ==  'pending' || $books->approval_by_smd == 'parked'  ? 'rejected' : '') . '" data-id="' . $books->id . '">' . ($books->approval_by_smd == 'pending' || $books->approval_by_smd == 'parked' ? "Reject" : ($books->approval_by_smd == 'rejected' ? "Rejected" : "")) . '</button>';

            $status = '<button class="status_admin btn-sm btn ' . ($books->approval_by_admin == 1 ? "btn-success" : "btn-danger") . '  " data-status="' . ($books->approval_by_admin == 1  ? '0' : '1') . '" data-id="' . $books->id . '">' . ($books->approval_by_admin == 1 ? "Approved" : "Not-Approved") . '</button>';
            $data[] = array(
                $i++,
                $books->name,
                '<img src="' . url('public/' . $books->profile) . '" style="height:50px;border-radius:10px;">',

                $userprofile,
                $status,
                $approve . " " . $reject . " " . $parked,

            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }
    public function mdpanelaccess(Request $request)
    {
        $uniqueId = base64_decode($request->id);
        if (Auth::guard('mddoctor')->loginUsingId(['id' => $uniqueId])) {
            Helper::addToActivities('VIEW PROFILE OF MD  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'GET');

            return redirect()->intended('md/dashboard');
        } else {

            return response()->json(array('status' => false, 'msg' => "Credentials not matched !"));
            exit;
        }
    }
    public function status(Request $request)
    {
        $rules = [
            'id' => ['required', 'exists:mddoctors']
        ];

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }
        $data = [
            'approval_by_admin' => $request->status,
            'admin_status_id' =>  Auth::guard('admin')->user()->id,
        ];
        $updatedata = Mddoctor::where('id', $request->id)->update($data);
        if ($updatedata) {
            Helper::addToActivities('APPROVAL  STATUS CHANGE SUCCESS  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => "Approval Staus Change Successfully"]);
            exit;
        } else {
            Helper::addToActivities('APPROVAL STATUS CHANGE FAILE  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
            exit;
        }
    }

    public function profile(Request $request)
    {
        $disbar = "approval.mddoctor";
        $uniqueId = base64_decode($request->id);
        $details = Mddoctor::where('id', $uniqueId)->first();
        $specilisation = json_decode($details->specilization);
        $educatioDetails = Doctorseducationdetail::where('doctor_id', $uniqueId)->get();
        return view('admin.approval.mddoctor.profile', compact('disbar', 'details', 'educatioDetails', 'specilisation'));
    }

    public function educationAjax(Request $request)
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
        // $orderType = $request->order[0]['dir'];
        // $nameOrder = $request->columns[$request->order[0]['column']]['name'];


        $total = Doctorseducationdetail::where('doctor_id', $request->id)->where('type', 'md')->get()->count();
        $bookings =  Doctorseducationdetail::orWhere(function ($query) use ($search) {
            $query->orWhere('degree', 'like', '%' . $search . '%');
            $query->orwhere('college', 'like', '%' . $search . '%');
        })->where('doctor_id', $request->id)->where('type', 'md')
            ->get();

        $i = 1 + $ofset;
        $data = [];
        foreach ($bookings as $books) {
            $userprofile = '<a href="' . url('admin/approval/mdprofile/' . base64_encode($books->id)) . '" target="_blank" class="btn btn-info  badge-info "><i class="fa fa-user-circle coloset"></i></a>';
            // $parked = '<button class="status_item btn-sm btn ' . ($books->approval_by_smd == 'pending' ? "btn  btn-outline-warning" : ($books->approval_by_smd == 'parked' ? "text-warning" : "text-info")) . '  " data-status="' . ($books->approval_by_smd ==  'pending'  ? 'parked' : '"') . '" data-id="' . $books->id . '">' . ($books->approval_by_smd == 'pending' ? "Park" : ($books->approval_by_smd == 'parked' ? "Parked" : ""))  . '</button>';

            $reject = '<button class=" btn-sm btn ' . ($books->approved_status == 'pending' ? "btn  btn-outline-success status_item" : ($books->approved_status == 'approved' ? "text-success" : "text-info")) . '  " data-status="' . ($books->approved_status ==  'pending'  ? 'approved' : '') . '" data-id="' . $books->id . '">' . ($books->approved_status == 'pending' ? "Approve" : ($books->approved_status == 'approved' ? "Approved" : "")) . '</button>';
            $approve = '<button class=" btn-sm btn ' . ($books->approved_status == 'pending' ? "btn  btn-outline-danger status_item" : ($books->approved_status == 'rejected' ? "text-danger" : "text-info")) . '  " data-status="' . ($books->approved_status ==  'pending'  ? 'rejected' : '') . '" data-id="' . $books->id . '">' . ($books->approved_status == 'pending' ? "Reject" : ($books->approved_status == 'rejected' ? "Rejected" : "")) . '</button>';
            $data[] = array(
                $i++,
                $books->degree,
                $books->college,
                '<img src="' . url('public/' . $books->college_documnet) . '" style="height:50px;border-radius:10px;">',
                $books->year_of_completion,
                $approve . " " . $reject,



            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function educationstatus(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => ['required', 'exists:doctorseducationdetails,id'],
            'status' => ['required'],
        ]);

        if ($validation->fails()) {
            return response()->json(['status' => false, 'msg' => $validation->errors()->first()]);
        }
        $data = [
            'approved_by_id' =>  Auth::guard('admin')->user()->id,
            'approved_by_type' => 'admin',
            'approved_status' => $request->status
        ];

        $updatedata = Doctorseducationdetail::where('id', $request->id)->update($data);

        if ($updatedata) {
            Helper::addToActivities('STATUS CHANGE DOCTOR EDUCATION  SUCCESS  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => " Staus Change Successfully"]);
            exit;
        } else {
            Helper::addToActivities('STATUS CHNAGE DOCTOR EDUCATION FAILE  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
            exit;
        }
    }
    public function doctorstatus(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => ['required', 'exists:mddoctors,id'],
            'status' => ['required'],
        ]);

        if ($validation->fails()) {
            return response()->json(['status' => false, 'msg' => $validation->errors()->first()]);
        }
        $data = [
            'smd_approval_id' =>  Auth::guard('admin')->user()->id,
            // 'approved_by_type' => 'seniorMd',
            'approval_by_smd' => $request->status,
            'smd_approval_type' => 'admin',
        ];

        $updatedata = Mddoctor::where('id', $request->id)->update($data);

        if ($updatedata) {
            Helper::addToActivities('STATUS CHANGE DOCTOR EDUCATION  SUCCESS  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => " Staus Change Successfully"]);
            exit;
        } else {
            Helper::addToActivities('STATUS CHNAGE DOCTOR EDUCATION FAILE  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
            exit;
        }
    }
}
