<?php

namespace App\Http\Controllers\Admin\RoleCreation;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Mddoctor;
use App\Models\Roleallocation;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class RoleCreationController extends Controller
{
    /**
     * show role
     */
    public function show()
    {
        $disbar = 'role.admin';
        return view('admin.roleallocation.show', compact('disbar'));
    }
    /**
     * ajax role
     */
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


        $total = Roleallocation::get()->count();
        $bookings = Roleallocation::orWhere(function ($query) use ($search) {
            $query->orWhere('name_role', 'like', '%' . $search . '%');
        })
            ->get();

        $i = 1 + $ofset;
        $data = [];
        foreach ($bookings as $books) {
            $url = url("admin/role/permission/" . $books->id);
            $permission = '<a href="'.$url.'" class="permission btn-sm btn btn-info text-white" data-id="' . $books->id . '">Add Permission</a>';
            $status = '<button class="status_item btn-sm btn  ' . ($books->status == 1 ? "btn-success" : "btn-danger") . '  " data-status="' . ($books->status == 1  ? '0' : '1') . '" data-id="' . $books->id . '">' . ($books->status == 1 ? "Active" : "De-Active") . '</button>';
            $data[] = array(
                $i++,
                $books->name_role,
                $permission,
                $status,
                '<a href="#" class="btn btn-danger btn-sm   delete_item"data-id = "' . $books->id . '" data-name = "' . $books->name . '" ><span class="fe fe-trash"></span></a>',


            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }
    public function status(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required|Exists:roleallocations'
        ]);

        if ($validate->fails()) {

            return response()->json(['status' => false, 'msg' => $validate->errors()->first()]);
            exit;
        } else {
            $data = ['status' => $request->status];
            $statusUpdate = Roleallocation::where('id', $request->id)->update($data);
            if ($statusUpdate) {

                Helper::addToActivities('ROLE STATUS -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

                return response()->json(['status' => true, 'msg' => "Role Status Successfully"]);
                exit;
            } else {
                Helper::addToActivities('ROLE STATUS FAILE -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

                return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
                exit;
            }
        }
    }

    public function delete(Request $request)
    {
        try {
            $deletedata = Roleallocation::where('id', $request->id)->delete();
            if ($deletedata) {

                Helper::addToActivities('ROLE DELETE -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

                return response()->json(['status' => true, 'msg' => "Role Delete Successfully"]);
                exit;
            } else {
                Helper::addToActivities('ROLE DELETE FAILE  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

                return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
                exit;
            }
        } catch (Exception $e) {
            Helper::addToActivities('ROLE DELETE FAILE  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

            return response()->json(array('status' => false, 'msg' => 'Errors Occurs !! Try Again Later'));
        }
    }

    public function add_role(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'role' => 'required'
        ]);

        if ($validate->fails()) {

            // return response()->json(array('status' => false, 'msg' => $validate->errors()->first()));
            // return response()->json(['status' => true, 'msg' => "Role Status Successfully"]);
            // exit;
            return response()->json(['status' => false,  'msg' => $validate->errors()->first()]);
            exit;
        }

        $data = new Roleallocation;
        $data->name_role = $request->role;
        $datasave = $data->save();
        if($datasave)
        {
            return response()->json(array('status' => true, 'msg' => "Role Add Successfully"));
            exit;
        }
        else{
            return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
            exit;
        }

    }


}
