<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function staff_list()
    {
        $disbar = 'admin.staff';
        return view('admin.staff.stafflist',compact('disbar'));
    }

    public function add_role(Request $request)
    {
        $validate = Validator::make($request->all(), [

            'name' => 'required',
            'role' => 'required',
            'email' => 'required|unique:staff,email',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false,  'msg' => $validate->errors()->first()]);
            exit;
        }

        $data = new Staff;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->password = Hash::make($request->password);
        $savedata = $data->save();
        if ($savedata) {
            return response()->json(['status' => true, 'msg' => 'Staff Added Successfully']);
            exit;
        } else {
            return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
            exit;
        }

    }

    public function staff_ajax_list(Request $request)
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


        $total = Staff::get()->count();
        $services = Staff::orWhere(function ($query) use ($search) {
            $query->orWhere('name', 'like', '%' . $search . '%');
        })
            ->get();

        $i = 1 + $ofset;
        $data = [];

        foreach ($services as $service) {
            $status = '<button class="status_item btn-sm btn  ' . ($service->status == 1 ? "btn-success" : "btn-danger") . '  " data-status="' . ($service->status == 1  ? '0' : '1') . '" data-id="' . $service->id . '">' . ($service->status == 1 ? "Active" : "De-Active") . '</button>';

            $data[] = array(
                $i++,
                $service->name,
                $service->role,
                $service->email,

                // $status,
                '<a href="#" class="btn btn-primary btn-sm  edit_item"data-id = "'.$service->id.'" data-name = "'.$service->name.'" data-email = "'.$service->email.'" data-role = "'.$service->role.'" ><span class="fe fe-edit"></span></a>',
                '<a href="#" class="btn btn-danger btn-sm   delete_item"data-id = "'.$service->id.'"  ><span class="fe fe-trash"></span></a>',



            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }


    public function edit_staff(Request $request)
    {
        $rules = [
            'role' => ['required'],
            'name' => ['required'],
        ];
            $olddata = Staff::where('id',$request->id)->first();

        // $oldData[0]->phone != $request->phone

        if($olddata->email != $request->email )
        {
            $rules['email'] = ['required','unique:staff,email'];
        }

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
            exit;
        }

        $data = [
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
        ];
        $updated = Staff::where('id', $request->id)->update($data);
        if ($updated) {
            return response()->json(['status' => true, 'msg' => ' Staff Edit Successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
        }


    }

    public function delete_staff(Request $request)
    {
        $delete = Staff::where('id', $request->id)->delete();
        if ($delete) {
            return response()->json(['status' => true, 'msg' => 'Staff Delete Successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
        }
    }

}
