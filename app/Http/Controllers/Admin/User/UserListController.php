<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Roleallocation;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helper\Helper;

class UserListController extends Controller
{
    public function show()
    {
        $disbar = 'registration.user';
        return view('admin.register.userlist.userlist', compact('disbar'));
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


        $total = User::get()->count();
        $bookings = User::orWhere(function ($query) use ($search) {
            $query->orWhere('name', 'like', '%' . $search . '%');
        })
            ->get();

        $i = 1 + $ofset;
        $data = [];
        foreach ($bookings as $books) {
            $useraccess = '<a href="' . url('admin/user_access/' . base64_encode($books->id)) . '" target="_blank" class="btn btn-danger "><i class="fa fa-universal-access"></i></a>';
            $status = '<button class="status_item btn-sm btn ' . ($books->status == 1 ? "btn-success" : "btn-danger") . '  " data-status="' . ($books->status == 1  ? '0' : '1') . '" data-id="' . $books->id . '">' . ($books->status == 1 ? "Active" : "De-Active") . '</button>';
            $data[] = array(
                $books->name,
                '<img src="' . url('public/' . $books->profile) . '" style="height:50px;border-radius:10px;">',
                $status,
                $useraccess,
                ' <a href="#" class="btn btn-success btn-sm   edit_item" data-id = "' . $books->id . '" data-name = "' . $books->name . '" data-image ="' . $books->photo . '"><i class="fe fe-pencil"></i></a>
                <a href="#" class="btn btn-danger btn-sm   delete_item"data-id = "' . $books->id . '" data-name = "' . $books->name . '" ><span class="fe fe-trash"></span></a>',


            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }
    public function userpanelaccess(Request $request)
    {
        $uniqueId = base64_decode($request->id);
        if (Auth::guard('user')->loginUsingId(['id' => $uniqueId])) {
            Helper::addToActivities(' user login -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'WEBADMIN');
            return redirect()->intended('user/dashboard');
        } else {
            return response()->json(array('status' => false, 'msg' => "Credentials not matched !"));
            exit;
        }
    }
    public function status(Request $request)
    {
        $rules = [
            'id' => ['required', 'exists:users']
        ];

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }
        $data = ['status' => $request->status];
        $updatedata = User::where('id', $request->id)->update($data);
        if ($updatedata) {
            Helper::addToActivities('User status update -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN');

            return response()->json(['status' => true, 'msg' => " Staus Change Successfully"]);
            exit;
        } else {

            return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
            exit;
        }
    }
    public function delete(Request $request)
    {
        $rules = [
            'id' => ['required', 'exists:users']
        ];

        $msg =  Validator::make($request->all(), $rules);
        if ($msg->fails()) {
            return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
        }

        $updatedata = User::where('id', $request->id)->delete();
        if ($updatedata) {
            Helper::addToActivities('hotel status update -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN');

            return response()->json(['status' => true, 'msg' => " User Delete Successfully"]);
            exit;
        } else {

            return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
            exit;
        }
    }

    public function user_report()
    {
        $disbar = 'report.admin';
        return view('admin.report.report_list',compact('disbar'));
    }

    public function user_report_list(Request $request)
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


        $total = User::get()->count();
        $bookings = User::orWhere(function ($query) use ($search) {
            $query->orWhere('user_unique_id', 'like', '%' . $search . '%');
            $query->orWhere('last_name', 'like', '%' . $search . '%');
            $query->orWhere('second_name', 'like', '%' . $search . '%');
            $query->orWhere('name', 'like', '%' . $search . '%');

        })
            ->get();

        $i = 1 + $ofset;
        $data = [];
        foreach ($bookings as $books) {
            $permission = '<button class="permission btn-sm btn btn-info text-white" data-id="' . $books->id . '">Add Permission</button>';
            $status = '<button class="status_item btn-sm btn  ' . ($books->status == 1 ? "btn-success" : "btn-danger") . '  " data-status="' . ($books->status == 1  ? '0' : '1') . '" data-id="' . $books->id . '">' . ($books->status == 1 ? "Active" : "De-Active") . '</button>';
            $data[] = array(
                $i++,
                $books->user_unique_id,
                $books->name,
                $books->second_name,
                $books->last_name,
                $books->phone,
                $books->alternate_number,
                $books->email,
                $books->address,
                $books->family_size,
                $books->gender,
                $books->age,
                $books->service_type,
                date('Y-m-d',strtotime($books->created_at)),

                // $status,
                // '<a href="#" class="btn btn-danger btn-sm   delete_item"data-id = "' . $books->id . '" data-name = "' . $books->name . '" ><span class="fe fe-trash"></span></a>',


            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }
}
