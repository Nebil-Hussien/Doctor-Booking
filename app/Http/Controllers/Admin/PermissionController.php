<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privilege;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PermissionController extends Controller
{
    public function add_permission(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            $validator = Validator::make($data, [
                'module' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(array('status' => false, 'msg' => $validator->errors()->first()));
                exit;
            } else {

                Privilege::where('role_id' , $data['role_id'])->delete();

                foreach ($data['module'] as $key => $items) {
                    // print_r($data['submodule' . $items]);exit;
                    if (isset($data['submodule' . $items])) {

                        foreach ($data['submodule' . $items] as $key1 => $items2) {
                            foreach ($data['access' . $items . $items2] as $key2 => $items3) {
                                if (isset($items3)) {
//                                    echo $items3;
                                    if (isset($data['add' . $items . $items2])) {
                                        $add = $data['add' . $items . $items2];
                                    } else {
                                        $add = ['0' => ''];
                                    }
                                    if (isset($data['edit' . $items . $items2])) {
                                        $edit = $data['edit' . $items . $items2];
                                    } else {
                                        $edit = ['0' => ''];
                                    }
                                    if (isset($data['delete' . $items . $items2])) {
                                        $delete = $data['delete' . $items . $items2];
                                    } else {
                                        $delete = ['0' => ''];
                                    }


                                    if ($items3 === 'Read' || $items3 === 'Write') {
                                        $addPrivilage = new Privilege();
                                        $addPrivilage->role_id = $data['role_id'];
                                        $addPrivilage->module   = $items;
                                        $addPrivilage->submodule= $items2;
                                        $addPrivilage->access   = $items3;
                                        $addPrivilage->add      = $add[0];
                                        $addPrivilage->edit     = $edit[0];
                                        $addPrivilage->delete   = $delete[0];
                                        $addPrivilage->status   = 1;

                                        // print_r($addPrivilage);exit;
                                        // $addPrivilage->created_by = Auth::guard('admin')->user()->id;
                                        // $result = Privilege::where(['module' => $items, 'submodule' => $items2)->get();
                                        // if($result->count() > 0) {
                                        //     $updateData = [
                                        //         'access' => $items3,
                                        //         'add' => $add[0],
                                        //         'edit' => $edit[0],
                                        //         'delete' => $delete[0],
                                        //     ];
                                        //     $affected = Privilege::where(['module' => $items, 'submodule' => $items2])->update($updateData);
                                        // }
                                        // else{
                                            // MyHelper::addToLog('Privilege assigned. !!!!!!' , Auth::guard('admin')->user()->id , 'ADMIN');
                                            $affected = $addPrivilage->save();
                                        // }
                                    }
                                }
                            }

                        }
                    }
                }

                if(isset($affected))
                {
                    Helper::addToActivities('Permission edit -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

                    return response()->json(array('status' => true,'msg' => "Successfully Updated !"));
                    exit();
                }
                else{
                    return response()->json(array('status' => false,'msg' => "Error Occured, please try again"));
                    exit();
                }
            }
        }
    }

    public function permission($id)
    {
        $disbar = 'registration.mddoctor';
        return view('admin.roleallocation.permission.permission', compact('disbar','id'));
    }
}
