<?php

namespace App\Http\Controllers\Mddoctor\Appointment;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctorappointment;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Auth;

class MdAppointmentController extends Controller
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
        $id = Auth::guard('mddoctor')->id();

        $total = Appointment::get()->count();
        $bookings = [];
        $value = Schedule::select('days', 'start_time', 'end_time')
            ->orWhere(function ($query) use ($search) {
                $query->orWhere('days', 'like', '%' . $search . '%');
            })->where('md_id', $id)->get();


        foreach ($value as $key => $obj) {
            $booking = Appointment::select('appointments.*', 'services.service')
                ->join('doctorservices', 'doctorservices.service_id', '=', 'appointments.service_id')
                ->join('mddoctors', 'mddoctors.id', '=', 'doctorservices.md_id')
                ->join('services', 'doctorservices.service_id', '=', 'services.id')
                ->Where(function ($query) use ($search) {
                    $query->orWhere('appointments.day', 'like', '%' . $search . '%');
                    $query->orWhere('services.service', 'like', '%' . $search . '%');
                    $query->orWhere('appointments.payment_type', 'like', '%' . $search . '%');
                })
                ->where('doctorservices.md_id', $id)
                ->where('appointments.appointment_status', 'pending')
                ->Where('appointments.day', 'like', '%' . $obj->days . '%')
                ->where('appointments.start_time', '>=', $obj->start_time)
                ->where('appointments.start_time', '<=', $obj->end_time)

                ->get();
            if (count($booking) > 0) {
                $bookings[] = $booking;
            }
        }


        $i = 1 + $ofset;
        $data = [];
        foreach ($bookings as $obj) {
            foreach ($obj as $key => $books) {

                $status = '<button class=" status_item statusVerifiedClick btn  btn-sm  w-100 ' . ($books->appointment_status == 'accepted' ? "btn-success" : "btn-danger") . '  " data-status="' . ($books->appointment_status == "accepted"  ? 'pending' : 'accepted') . '" data-id="' . $books->id . '"  >' . ($books->appointment_status == "accepted" ? 'Accepted' : 'Pending') . '</button>';
                $data[] = array(
                    $i++,
                    $books->no_patient,
                    $books->service,
                    $books->date,
                    $books->start_time,
                    $books->price,
                    $books->payment_type,
                    $status

                );
            }
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function appointment_status(Request $request)
    {
        $id = Auth::guard('mddoctor')->id();
        $input = [
            'appointment_status' => $request->status,
            'md_id' => $id,
            'status_change_id' => $id,
            'status_change_by' => 'mddoctor',
        ];

        if ($request->status == 'pending') {
            return response()->json(['status' => false, 'msg' => 'already Accepted']);
            exit;
        }
        $data = Appointment::where('id', $request->id)->update($input);
        if ($data) {
            $data = [
                'appointment_id' => $request->id,
                'md_doctor_id' => $id,
                'doctor_appointment_status' => 'accepted'
            ];
            $DoctorAppointment  = Doctorappointment::create($data);
            if (!$DoctorAppointment) {
                Helper::addToActivities('Doctor Appointment Faile -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');

                return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
                exit;
            }
            Helper::addToActivities('Doctor success -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => true, 'msg' => 'Status Update Successfully']);
            exit;
        } else {
            Helper::addToActivities('Doctor Appointment Faile -' . Auth::guard('mddoctor')->user()->id, Auth::guard('mddoctor')->user()->id, 'MD', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
            exit;
        }
    }
}
