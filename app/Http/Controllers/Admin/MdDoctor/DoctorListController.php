<?php

namespace App\Http\Controllers\Admin\MdDoctor;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Doctorseducationdetail;
use App\Models\Mddoctor;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorListController extends Controller
{
   public function show()
   {
      $disbar = 'registration.mddoctor';
      return view('admin.register.mddoctor.mdlist', compact('disbar'));
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


      $total = Mddoctor::get()->count();
      $bookings = Mddoctor::orWhere(function ($query) use ($search) {
         $query->orWhere('name', 'like', '%' . $search . '%');
      })
         ->get();

      $i = 1 + $ofset;
      $data = [];
      foreach ($bookings as $books) {
         $userprofile = '<a href="' . url('admin/mdprofile/' . base64_encode($books->id)) . '" target="_blank" class="btn btn-info  badge-info "><i class="fa fa-user-circle-o"></i></a>';

         $useraccess = '<a href="' . url('admin/mddoctor_access/' . base64_encode($books->id)) . '" target="_blank" class="btn btn-danger"><i class="fa fa-universal-access"></i></a>';
         $status = '<button class="status_item btn-sm btn ' . ($books->status == 1 ? "btn-success" : "btn-danger") . '  " data-status="' . ($books->status == 1  ? '0' : '1') . '" data-id="' . $books->id . '">' . ($books->status == 1 ? "Active" : "De-Active") . '</button>';
         $data[] = array(
            $books->name,
            '<img src="' . url('public/' . $books->profile) . '" style="height:50px;border-radius:10px;">',
            $status,
            $useraccess,
            $userprofile,
            ' <a href="#" class="btn btn-success btn-sm   edit_item" data-id = "' . $books->id . '" data-name = "' . $books->name . '" data-image ="' . $books->photo . '"><i class="fe fe-pencil"></i></a>
             <a href="#" class="btn btn-danger btn-sm   delete_item"data-id = "' . $books->id . '" data-name = "' . $books->name . '" ><span class="fe fe-trash"></span></a>',


         );
      }

      $records['recordsTotal'] = $total;
      $records['recordsFiltered'] =  $total;
      $records['data'] = $data;


      echo json_encode($records);
   }
   public function mdpanelaccess(Request $request)
   {
      $uniqueId = base64_decode($request->id);
      if (Auth::guard('mddoctor')->loginUsingId(['id' => $uniqueId])) {
         Helper::addToActivities('VIEW PROFILE OF MD  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'GET');

         return redirect()->intended('md/dashboard');
      } else {

         return response()->json(array('status' => false, 'msg' => "Credentials not matched !"));
         exit;
      }
   }
   public function status(Request $request)
   {
      $rules = [
         'id' => ['required', 'exists:mddoctors']
      ];

      $msg =  Validator::make($request->all(), $rules);
      if ($msg->fails()) {
         return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
      }
      $data = ['status' => $request->status];
      $updatedata = Mddoctor::where('id', $request->id)->update($data);
      if ($updatedata) {
         Helper::addToActivities('STATUS CHANGE SUCCESS  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

         return response()->json(['status' => true, 'msg' => " Staus Change Successfully"]);
         exit;
      } else {
         Helper::addToActivities('STATUS CHNAGE FAILE  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

         return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
         exit;
      }
   }
   public function delete(Request $request)
   {
      $rules = [
         'id' => ['required', 'exists:mddoctors']
      ];

      $msg =  Validator::make($request->all(), $rules);
      if ($msg->fails()) {
         return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
      }

      $updatedata = Mddoctor::where('id', $request->id)->delete();
      if ($updatedata) {
         Helper::addToActivities('delete md profile SUCCESS  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

         return response()->json(['status' => true, 'msg' => " Medical Doctor Delete Successfully"]);
         exit;
      } else {
         Helper::addToActivities('delete md profile faile  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');

         return response()->json(['status' => false, 'msg' => "Something Went Wrong"]);
         exit;
      }
   }
   public function profile(Request $request)
   {
      $disbar = 'registration.mddoctor';
      $uniqueId = base64_decode($request->id);
      $details = Mddoctor::where('id', $uniqueId)->first();
      $specilisation = json_decode($details->specilization);
      $educatioDetails = Doctorseducationdetail::where('doctor_id', $uniqueId)->get();
      return view('admin.register.mddoctor.profile', compact('disbar', 'details', 'educatioDetails', 'specilisation'));
   }

   public function add()
   {
      $disbar = 'registration.mddoctor';
      return view('admin.register.mddoctor.register', compact('disbar',));
   }
   public function addSubmit(Request $request)
   {
      $rules = [

         "name"          => ['required'],
         "password"      => ['required'],
         "email"         => ['required'],
         "phone"       => ['required'],
         "address"       => ['required'],
         "lng"           => ['required'],
         "lat"           => ['required'],
      ];

      $msg =  Validator::make($request->all(), $rules);
      if ($msg->fails()) {
         return response()->json(['status' => false, 'msg' => $msg->errors()->first()]);
      }
      $biography = '';
      $profile = '';
      $idcode = md5(uniqid(rand(), true));
      if (!empty($request->biography)) {
         $biography = $request->biography;
      }
      if ($request->hasFile('profile')) {
         $logoname = $request->file('profile')->getClientOriginalExtension();
         $random = substr(uniqid(), 0, 9) . '.' . $logoname;

         $profile = 'projectfolder/md/profile/' . $random;
         $request->file('profile')->move(public_path() . '/projectfolder/md/profile/', $random);
      }
      $data = [
         'md_unique_id' => $idcode,
         'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'address' => $request->address,
         'lat' => $request->lat,
         'long' => $request->lng,
         'gender' => $request->gender,
         'password' => Hash::make($request->password),
         'biography' => $biography,
         'country' => $request->country,
         'state' => $request->state,
         'city' => $request->city,
         'profile' => $profile,
      ];

      $mdregistration = Mddoctor::create($data);
      if ($mdregistration) {
         Helper::addToActivities('CHNAGE ADDRESS CHANGE SUCCESS  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');
         return response()->json(['status' => true, 'msg' => 'registration complete']);
      } else {
         Helper::addToActivities('CHNAGE ADDRESS CHANGE FAILE  -' . Auth::guard('admin')->user()->id, Auth::guard('admin')->user()->id, 'ADMIN', $request->fullUrl(), $request->ip(), 'POST');
         return response()->json(['status' => false, 'msg' => 'Some thing went wrong']);
      }
   }
}
