<?php

namespace App\Http\Controllers\Admin\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentPatient;
use App\Models\Mddoctor;
use App\Models\Doctorappointment;
use App\Models\Doctorservice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminAppointmentController extends Controller
{
    public function appointmentlist()
    {
        $disbar = 'admin.appointmentlist';
        return view('admin.appointment.appointmentlist', compact('disbar'));
    }

    public function appointmentlist_ajax(Request $request)
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


        $total = Appointment::count();
        $services = Appointment::select('appointments.*', 'services.service')->join('services', 'appointments.service_id', '=', 'services.id')->orWhere(function ($query) use ($search) {
            $query->orWhere('day', 'like', '%' . $search . '%');
        })
            ->get();

        $i = 1 + $ofset;
        $data = [];

        foreach ($services as $service) {
            $status = '<button class="status_item btn-sm btn  ' . ($service->status == 1 ? "btn-success" : "btn-danger") . '  " data-status="' . ($service->status == 1  ? '0' : '1') . '" data-id="' . $service->id . '">' . ($service->status == 1 ? "Active" : "De-Active") . '</button>';

            $data[] = array(
                $i++,
                $service->no_patient,
                $service->service,
                $service->date,
                $service->start_time,
                $service->price,
                $service->payment_type,

                '<a href="' . url('admin/allocation/' . "$service->id") . '"  data-id = "' . $service->id . '" class=" ' . ($service->appointment_status == 'pending' ? " btn btn-danger" : "text-primary notwork  ") . ' ">' . $service->appointment_status . '</a>'

                // '<a href="#" class="btn btn-primary btn-sm  edit_item"data-id = "' . $service->id . '" data-price = "' . $service->price . '" data-service = "' . $service->service . '" ><span class="fe fe-edit"></span></a>',
                // '<a href="#" class="btn btn-danger btn-sm   delete_item"data-id = "' . $service->id . '"  ><span class="fe fe-trash"></span></a>',


            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }


    // public function appointmentlist_doctor_list(Request $request, $id)
    // {

    //     $data = Appointment::where('id', $id)->first();

    //     $doctorservices = Doctorservice::select('doctorservices.*', 'schedules.md_id as doctor_id', 'days', 'start_time', 'end_time')
    //         ->join('schedules', 'doctorservices.md_id', '=', 'schedules.md_id')->where('doctorservices.service_id', $data->service_id)->where('start_time', '<', $data->start_time)->where('end_time', '>', $data->start_time)->get();
    //     $user = AppointmentPatient::where('appointment_id', $id)->where('type', 'user')->first();
    //     $users = User::where('id', $data->user_id)->first();

    //     $family = AppointmentPatient::where('appointment_id', $id)->where('type', 'family')->get();

    //     $doctor = [];

    //     foreach ($doctorservices as $doctorservicess) {

    //         array_push($doctor, Mddoctor::where('id', $doctorservicess->md_id)->where('country', $users->country)->where('state', $users->state)->where('city', $users->city)->first());
    //     }


    //     $disbar = 'admin.appointmentlist';



    //     return view('admin.appointment.doctor_allotment', compact('disbar', 'data', 'doctor'));
    // }

    public function appointmentlist_doctor_list(Request $request, $id)
    {
        $data = Appointment::where('id', $id)->first();
        $users = User::where('id', $data->user_id)->first();

        $listDoctor = Mddoctor::join('doctorservices', 'doctorservices.md_id', '=', 'mddoctors.id')->where('doctorservices.service_id', $data->service_id)->where('mddoctors.country', $users->country)->where('state', $users->state)->where('city', $users->city)->get();

        $doctor = [];
        foreach ($listDoctor as $key => $obj) {

            $value23 = Mddoctor::join('schedules', 'schedules.md_id', '=', 'mddoctors.id')->where('mddoctors.id', $obj->md_id)->where('schedules.start_time', '<', $data->start_time)->where('schedules.end_time', '>', $data->start_time)->first();
            if (!is_null($value23)) {
                array_push($doctor, $value23);
            }
        }
        $disbar = 'admin.appointmentlist';
        return view('admin.appointment.doctor_allotment', compact('disbar', 'data', 'doctor'));
    }

    public function doctorappointment(Request $request)
    {
        // appointment_id
        $data = [
            'md_id' => $request->md_id,
            'status_change_id' => Auth::guard('admin')->id(),
            'status_change_by' => 'admin'
        ];

        $updatedata = Appointment::where('id', $request->appointment_id)->update($data);

        $datas = new Doctorappointment;
        $datas->appointment_id = $request->appointment_id;
        $datas->md_doctor_id = $request->md_id;
        $datas->doctor_appointment_status =  "accepted";
        $savedata = $datas->save;
        if ($savedata) {
            return response()->json(['status' => true, 'msg' => "Accept"]);
            exit;
        } else {
            return response()->json(['status' => false, 'msg' => "Something went wrong"]);
            exit;
        }
    }
}
