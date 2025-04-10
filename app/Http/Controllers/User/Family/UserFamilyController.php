<?php

namespace App\Http\Controllers\User\Family;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Seniormd;
use App\Models\Userfamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class UserFamilyController extends Controller
{
    public function show()
    {
        $countfamily = Userfamily::where('user_id', Auth::guard('user')->user()->id)->count();

        return view('userview.family.index', compact('countfamily'));
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


        $total = Userfamily::get()->count();
        $bookings = Userfamily::orWhere(function ($query) use ($search) {
            $query->orWhere('name', 'like', '%' . $search . '%');
        })
            ->get();

        $i = 1 + $ofset;
        $data = [];
        foreach ($bookings as $books) {
            $url = route('user.family.edit.show', ['id' => $books->id]);
            // $userprofile = '<a href="' . url('admin/seniormdprofile/' . base64_encode($books->id)) . '" target="_blank" class="btn btn-info  badge-info "><i class="fa fa-user-circle-o"></i></a>';

            // $useraccess = '<a href="' . url('admin/seniormddoctor_access/' . base64_encode($books->id)) . '" target="_blank" class="btn btn-danger"><i class="fa fa-universal-access"></i></a>';
            $status = '<button class="status_item btn-200 btn  ' . ($books->status == 1 ? "btn-success" : "btn-danger") . '  " data-status="' . ($books->status == 1  ? '0' : '1') . '" data-id="' . $books->id . '"><i class="fe fe-pencil"></i></button>';
            $edit = '<button class=" btn-sm btn edit_item" data-id = "' . $books->id . '" data-name = "' . $books->name . '" data-image ="' . $books->image . '"><i class="fe fe-pencil"></i></button>';
            $delete = ' <a href="#" class=btn btn-info btn-sm   delete_item"data-id = "' . $books->id . '" data-name = "' . $books->name . '" ><span class="fe fe-trash"></span></a>';
            $data[] = array(
                '<img src="' . url('public/' . $books->image) . '" style="height:50px;border-radius:10px;">',
                $books->name,
                $books->relation,
                $books->dob,
                $books->age,
                $books->blood_type,
                '<a href="' . $url . '"class="btn btn-outline-warning edit_item" data-id = "' . $books->id . '" data-name = "' . $books->name . '" data-image ="' . $books->image . '"><i class="fa fa-edit"></i></a> <button class="btn btn-100 btn-outline-danger delete_item" data-id="' . $books->id . '"><i class="fa fa-trash"></i></button>'

            );
        }

        $records['recordsTotal'] = $total;
        $records['recordsFiltered'] =  $total;
        $records['data'] = $data;


        echo json_encode($records);
    }
    public function delete(Request $request)
    {
        try {
            $rules = [
                'id' => ['required', 'exists:userfamilies']
            ];

            $msg =  Validator::make($request->all(), $rules);
            if ($msg->fails()) {
                return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
            }

            $updatedata = Userfamily::where('id', $request->id)->delete();
            if ($updatedata) {
                Helper::addToActivities('delete FAMILY MEMBER  -' . Auth::guard('user')->user()->id, Auth::guard('user')->user()->id, 'USER', $request->fullUrl(), $request->ip(), 'POST');

                return response()->json(['status' => true, 'msg' => " family member Delete Successfully"]);
                exit;
            } else {
                Helper::addToActivities('delete FAMILY MEMEBER  -' . Auth::guard('user')->user()->id, Auth::guard('user')->user()->id, 'USER', $request->fullUrl(), $request->ip(), 'POST');

                return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
                exit;
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => false, 'msg' => 'Item Is Used ']);
        }
    }
    public function addshow()
    {
        return view('userview.family.add');
    }
    public function addsubmit(Request $request)
    {
        $profile = '';
        if ($request->hasFile('profile')) {
            $logoname = $request->file('profile')->getClientOriginalExtension();
            $random = substr(uniqid(), 0, 9) . '.' . $logoname;

            $profile = 'projectfolder/user/family/image/' . $random;
            $request->file('profile')->move(public_path() . '/projectfolder/user/profile/', $random);
        }
        $data = [
            // 'user_unique_id' => $idcode,
            'name' => $request->name,
            'gender' => $request->gender,
            'user_id' => Auth::guard('user')->user()->id,
            "dob" => $request->dob,
            "age" => $request->age,
            "gender" => $request->gender,
            "relation" => $request->relation,
            "blood_type" => $request->blood_group,
            'image' => $profile,

        ];
        $mdregistration = Userfamily::create($data);
        if ($mdregistration) {
            return response()->json(['status' => true, 'msg' => 'registration complete']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }

    /**
     * EDIT THE FAMILY PROFILE
     */
    public function editshow(Request $request)
    {
        $familyDetail = Userfamily::where('id', $request->id)->first();

        return view('userview.family.edit', compact('familyDetail'));
    }
    /**
     * edit submit of family details
     */
    public function editsubmit(Request $request)
    {

        $profile = '';
        if ($request->hasFile('profile')) {
            $logoname = $request->file('profile')->getClientOriginalExtension();
            $random = substr(uniqid(), 0, 9) . '.' . $logoname;

            $profile = 'projectfolder/user/family/image/' . $random;
            $request->file('profile')->move(public_path() . '/projectfolder/user/family/image/', $random);
        }
        $data = [
            // 'user_unique_id' => $idcode,
            'name' => $request->name,
            'gender' => $request->gender,
            'user_id' => Auth::guard('user')->user()->id,
            "dob" => $request->dob,
            "age" => $request->age,
            "gender" => $request->gender,
            "relation" => $request->relation,
            "blood_type" => $request->blood_group,
            'image' => $profile,
        ];

        $mdregistration = Userfamily::where('id', $request->id)->update($data);
        if ($mdregistration) {
            return response()->json(['status' => true, 'msg' => 'update the family detail']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
        }
    }
}
