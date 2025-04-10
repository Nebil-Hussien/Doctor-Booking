<?php

namespace App\Http\Controllers\User\Appointment;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentPatient;
use App\Models\Service;
use App\Models\Userfamily;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class UserAppointmentController extends Controller
{
    public function appointmentIndex()
    {

        return view('userview.appointment.appointment');
    }


    public function appointmentAjax(Request $request)
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


        $total = Appointment::where('user_id',  Auth::guard('user')->id())->get()->count();
        $bookings =  Appointment::select('appointments.*', 'users.name as user_name', 'users.age', 'services.service as service_name')->orWhere(function ($query) use ($search) {
            // $query->orWhere('degree', 'like', '%' . $search . '%');
            // $query->orwhere('college', 'like', '%' . $search . '%');
        })->join('users', 'users.id', '=', 'appointments.user_id')
            ->join('services', 'services.id', '=', 'appointments.service_id')
            ->where('user_id',  Auth::guard('user')->id())
            ->orderBy('created_at', 'DESC')
            ->get();

        $i = 1 + $ofset;
        $data = [];
        foreach ($bookings as $books) {



            $userprofile = '<a href="' . url('seniormd/approval/mdprofile/' . base64_encode($books->id)) . '" target="_blank" class="btn btn-info  badge-info "><i class="fa fa-user-circle coloset"></i></a>';
            $reject = '<a class=" ' . ($books->appointment_status == 'success' ? "text-warning" : ($books->appointment_status == 'accepted' ? "text-primary" : ($books->appointment_status == 'pending' ? "text-dark" : ""))) . '  " >' . ($books->appointment_status == 'success' ? "Completed" : ($books->appointment_status == 'accepted' ? "Accepted" : ($books->appointment_status == 'pending' ? "Pending" : ""))) . '</a>';
            $approve = '<a class=" ' . ($books->appointment_status == 'pending' || $books->appointment_status == 'accepted' ? "btn  btn-outline-info status_item" : ($books->appointment_status == 'cancle' ? "text-danger" : "")) . '  " data-status="' . ($books->approved_status ==  'pending' || $books->appointment_status == 'accepted'  ? 'cancle' : '') . '" data-id="' . $books->id . '">' . ($books->appointment_status == 'pending' || $books->appointment_status == 'accepted' ? "Cancle" : ($books->appointment_status == 'cancle' ? "Cancled" : "")) . '</a>';

            $data[] = array(
                $books->id,
                $books->no_patient,
                $books->service_name,
                $books->start_time,
                $books->date,
                $books->price,
                $books->payment_type,
                $reject . " " . $approve,



            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }


    public function appointmentCreate()
    {
        $userFamily = Userfamily::where('user_id', Auth::guard('user')->id())->get();

        $service = Service::where('status', '1')->get();
        return view('userview.appointment.createappointment', compact('userFamily', 'service'));
    }
    public function appointmentCreateData(Request $request)
    {
        $validatior = Validator::make($request->all(), [
            "noPatients" => "required",
            "service" => "required",
            "picDate" => "required",
            "picTime" => "required",
            "payment" => "required",
            "amount" => "required",
            "id" => "required|exists:users,id"
        ]);
        if ($validatior->fails()) {
            return response()->json(['status' => false, 'msg' => $validatior->errors()->first()]);
        }
        $data = [];

        $data['service_id'] = $request->service;
        $data['date'] = $request->picDate;
        $data['start_time'] = $request->picTime;
        $data['day'] = date("D", strtotime($request->picDate));
        $data['user_id'] = $request->id;
        $data['appointment_status'] = 'pending';
        $data['payment_status'] = '0';
        $data['status'] = '0';
        $data['payment_type'] = $request->payment;
        $data['price'] = $request->amount;
        $data['no_patient'] = $request->noPatients;
        // $data['pacient_id'] = json_encode($patient);
        $Appointment = Appointment::create($data);
        if ($Appointment) {

            foreach ($request->checkbox as $key => $obj) {
                $deatil = explode("/", $obj);
                $data = [
                    'appointment_id' => $Appointment['id'],
                    'patient_id' => $deatil[0],
                    'type' => $deatil[1],
                ];
                $PatienAdd = AppointmentPatient::create($data);
                if (!$PatienAdd) {
                    Helper::addToActivities('Pacient is not able to add   -' . Auth::guard('user')->user()->id, Auth::guard('user')->user()->id, 'USER', $request->fullUrl(), $request->ip(), 'POST');

                    return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
                    exit;
                }
            }
            Helper::addToActivities('Appointment Create  -' . Auth::guard('user')->user()->id, Auth::guard('user')->user()->id, 'USER', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => 'Update Successfully']);
        } else {
            Helper::addToActivities('Appointment not create  -' . Auth::guard('user')->user()->id, Auth::guard('user')->user()->id, 'USER', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
    public function appointmentStatus(Request $request)
    {
       $accept = Appointment::where('id',$request->id)->update(['appointment_status'=>$request->status]);
    }
}
