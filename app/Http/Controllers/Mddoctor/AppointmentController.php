<?php

namespace App\Http\Controllers\Mddoctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function appointment()
    {
        return view('mdview.appointment.appointment_list');
    }

    public function appointment_list(Request $request)
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


        $total = Appointment::get()->count();
        $bookings = Appointment::select('appointments.*', 'services.service', 'users.name')->join('services', 'appointments.service_id', '=', 'services.id')
            ->join('users', 'appointments.user_id', '=', 'users.id')->orWhere(function ($query) use ($search) {
                $query->orWhere('day', 'like', '%' . $search . '%');
            })->get();


        $i = 1 + $ofset;
        $data = [];
        foreach ($bookings as $books) {
            $userprofile = '<a href="' . url('seniormd/approval/mdprofile/' . base64_encode($books->id)) . '" target="_blank" class="btn btn-info  badge-info "><i class="fa fa-user-circle coloset"></i></a>';
            $parked = '<button class=" btn-sm btn ' . ($books->appointment_status == 'pending'  ? "btn  btn-outline-warning status_item" : ($books->appointment_status == 'success' ? "text-primary" : "")) . '  " data-status="' . ($books->appointment_status ==  'pending'  ? 'success' : '"') . '" data-id="' . $books->id . '">' . ($books->appointment_status == 'pending' ? "success" : ($books->appointment_status == 'success' ? "success" : ""))  . '</button>';
            $status = '<button class=" status_item statusVerifiedClick btn  btn-sm  w-100 ' . ($books->appointment_status == 'accepted' ? "btn-success" : "btn-danger") . '  " data-status="' . ($books->appointment_status == "accepted"  ? 'pending' : 'accepted') . '" data-id="' . $books->id . '"  >' . ($books->appointment_status == "accepted" ? 'Accepted' : 'Pending') . '</button>';
            // $reject = '<button class=" btn-sm btn ' . (($books->approval_by_smd == 'pending' || $books->approval_by_smd == 'parked') ? "btn  btn-outline-success status_item" : ($books->approval_by_smd == 'approved' ? "text-success" : "")) . '  " data-status="' . ($books->approval_by_smd ==  'pending' || $books->approval_by_smd == 'parked' ? 'approved' : '') . '" data-id="' . $books->id . '">' . ($books->approval_by_smd == 'pending' || $books->approval_by_smd == 'parked' ? "Approve" : ($books->approval_by_smd == 'approved' ? "Approved" : "")) . '</button>';
            // $approve = '<button class=" btn-sm btn ' . (($books->approval_by_smd == 'pending' || $books->approval_by_smd == 'parked') ? "btn  btn-outline-danger status_item" : ($books->approval_by_smd == 'rejected' ? "text-danger" : "")) . '  " data-status="' . ($books->approval_by_smd ==  'pending' || $books->approval_by_smd == 'parked'  ? 'rejected' : '') . '" data-id="' . $books->id . '">' . ($books->approval_by_smd == 'pending' || $books->approval_by_smd == 'parked' ? "Reject" : ($books->approval_by_smd == 'rejected' ? "Rejected" : "")) . '</button>';
            $data[] = array(
                $i++,
                $books->name,
                $books->service,
                $books->date,
                $books->start_time,
                $status

            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function appointment_status(Request $request)
    {


        $input['appointment_status']    = $request->status;
        if ($request->status == 'pending') {
            return response()->json(['status' => false, 'msg' => 'already Accepted']);
            exit;
        }
        $data = Appointment::where('id', $request->id)->update($input);
        if ($data) {
            return response()->json(['status' => true, 'msg' => 'Status Update Successfully']);
            exit;
        } else {
            return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
            exit;
        }
    }
}
