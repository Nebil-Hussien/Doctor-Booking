<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminServiceController extends Controller
{
    public function service_list()
    {
        $disbar = 'admin.service';
        return view('admin.service.service_list', compact('disbar'));
    }

    public function add_service(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'service' => 'required|unique:services,service',
            'price' => 'required'


        ]);

        if ($validate->fails()) {


            return response()->json(['status' => false,  'msg' => $validate->errors()->first()]);
            exit;
        }

        $data = new Service;
        $data->service = $request->service;
        $data->price = $request->price;
        $datasave = $data->save();
        if ($datasave) {
            return response()->json(array('status' => true, 'msg' => "Service Add Successfully"));
            exit;
        } else {
            return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
            exit;
        }
    }

    public function service_ajax_list(Request $request)
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


        $total = Service::get()->count();
        $services = Service::orWhere(function ($query) use ($search) {
            $query->orWhere('service', 'like', '%' . $search . '%');
        })
            ->get();

        $i = 1 + $ofset;
        $data = [];

        foreach ($services as $service) {
            $status = '<button class="status_item btn-sm btn  ' . ($service->status == 1 ? "btn-success" : "btn-danger") . '  " data-status="' . ($service->status == 1  ? '0' : '1') . '" data-id="' . $service->id . '">' . ($service->status == 1 ? "Active" : "De-Active") . '</button>';

            $data[] = array(
                $i++,
                $service->service,
                $service->price,
                $status,
                '<a href="#" class="btn btn-primary btn-sm  edit_item"data-id = "' . $service->id . '" data-price = "' . $service->price . '" data-service = "' . $service->service . '" ><span class="fe fe-edit"></span></a>',
                '<a href="#" class="btn btn-danger btn-sm   delete_item"data-id = "' . $service->id . '"  ><span class="fe fe-trash"></span></a>',


            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }

    public function edit_service(Request $request)
    {

        $rules = [
            'price' => ['required'],
        ];
        $olddata = Service::where('id', $request->id)->first();

        // $oldData[0]->phone != $request->phone

        if ($olddata->service != $request->service) {
            $rules['service'] = ['required', 'unique:services,service'];
        }

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
            exit;
        }

        $data = [
            'service' => $request->service,
            'price' => $request->price,

        ];
        $updated = Service::where('id', $request->id)->update($data);
        if ($updated) {
            return response()->json(['status' => true, 'msg' => ' Service Edit Successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
        }
    }

    public function delete_service(Request $request)
    {
        try{
            $delete = Service::where('id', $request->id)->delete();
            if ($delete) {
                return response()->json(['status' => true, 'msg' => 'Service Delete Successfully']);
            } else {
                return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
            }
        }
        catch(Exception $e )
        {
            return response()->json(['status' => false, 'msg' => 'This Service is already used']);
        }


    }

    public function status_service(Request $request)
    {


        $input['status']    = $request->status;
        $data = Service::where('id', $request->id)->update($input);
        if ($data) {
            return response()->json(['status' => true, 'msg' => 'Status Update Successfully']);
        }
        return response()->json(['status' => false, 'msg' => 'something went wrong']);
    }
}
