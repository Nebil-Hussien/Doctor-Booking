<?php

namespace App\Http\Controllers\Mddoctor\DoctorAppointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentPatient;
use App\Models\Doctorappointment;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Auth;

class DoctorAppointmentController extends Controller
{
    public function doctoreAppointment()
    {
        return view('mdview.doctorappointment.doctorappointment_list');
    }
    public function doctorappointment_list(Request $request)
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

        $total = Doctorappointment::where('md_doctor_id', $id)->count();



        $appointment = Doctorappointment::select('appointments.*', 'doctorappointments.id as doctor_appointment_id', 'doctorappointments.doctor_appointment_status', 'services.service')->join('appointments', 'appointments.id', '=', 'doctorappointments.appointment_id')
            ->join('services', 'appointments.service_id', '=', 'services.id')
            ->Where(function ($query) use ($search) {
                $query->orWhere('appointments.day', 'like', '%' . $search . '%');
                $query->orWhere('services.service', 'like', '%' . $search . '%');
                $query->orWhere('appointments.payment_type', 'like', '%' . $search . '%');
                $query->orWhere('appointments.price',  $search);
            })
            ->where('doctorappointments.md_doctor_id', $id)->get();

        $i = 1 + $ofset;
        $data = [];

        foreach ($appointment as $key => $books) {
            $Details = '<a class="' . ($books->doctor_appointment_status == 'accepted' ? 'btn  btn-outline-info ancherTag' : '') . '">"' . ($books->doctor_appointment_status == 'accepted' ? 'btn  btn-outline-info ancherTag' : '') . '"</a>';
            $cancle = '<a class="' . ($books->doctor_appointment_status == 'accepted' ? 'btn  btn-outline-danger CancleTag' : ($books->doctor_appointment_status == 'completed' ? '' : 'text-danger')) . '" >' . ($books->doctor_appointment_status == 'accepted' ? 'Cancle' : ($books->doctor_appointment_status == 'rejected' ? 'Cancled' : 'Completed')) . '</a>';
            $status = '<a   href="' . route('md.appointment.session.start', $books->id) . '" class="' . ($books->doctor_appointment_status == 'accepted' ? 'btn  btn-outline-info ancherTag ' : ($books->doctor_appointment_status == 'completed' ? 'text-info notwork' : 'text-danger notwork ')) . '" >' . ($books->doctor_appointment_status == 'accepted' ? 'Start Session' : ($books->doctor_appointment_status == 'completed' ? 'Session Completed' : 'Session Cancled')) . '</a>';
            $data[] = array(
                $i++,
                $books->no_patient,
                $books->service,
                $books->date,
                $books->start_time,
                $books->price,
                $books->payment_type,
                $status,
                $cancle,

            );
        }


        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }
    public function sessionStart($id)
    {
        $Doctid = Auth::guard('mddoctor')->id();
        $detail = Appointment::select('appointments.*', 'services.service', 'users.*')->join('services', 'services.id', '=', 'appointments.service_id')->join('users', 'users.id', '=', 'appointments.user_id')->where('appointments.id', $id)->first();
        $DoctorAppointment = Doctorappointment::where(['appointment_id' => $id, 'md_doctor_id' => $Doctid])->first();
        $pacientDetail = AppointmentPatient::join('userfamilies', 'userfamilies.id', '=', 'appointment_patients.patient_id')->where('appointment_patients.appointment_id', $id)->where('appointment_patients.type', 'family')->get();
        $pacientUserDetail = AppointmentPatient::select('users.*')->join('users', 'users.id', '=', 'appointment_patients.patient_id')->where('appointment_patients.appointment_id', $id)->where('appointment_patients.type', 'user')->first();

        return view('mdview.doctorappointment.sessiondoctorappointment.sessiondetailpage', compact('pacientUserDetail', 'pacientDetail', 'DoctorAppointment', 'detail'));
    }
}
