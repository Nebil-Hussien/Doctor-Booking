<?php

namespace App\Http\Controllers\Mddoctor\Sched;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index(){
        $sunday = Schedule::where('md_id',Auth::guard('mddoctor')->id())->where('days','sunday')->get();
        $monday = Schedule::where('md_id',Auth::guard('mddoctor')->id())->where('days','Monday')->get();
        $wednesday = Schedule::where('md_id',Auth::guard('mddoctor')->id())->where('days','wednesday')->get();
        $tuesday = Schedule::where('md_id',Auth::guard('mddoctor')->id())->where('days','tuesday')->get();
        $thursday = Schedule::where('md_id',Auth::guard('mddoctor')->id())->where('days','thursday')->get();
        $friday = Schedule::where('md_id',Auth::guard('mddoctor')->id())->where('days','friday')->get();
        $saturday = Schedule::where('md_id',Auth::guard('mddoctor')->id())->where('days','saturday')->get();


        return view('mdview.schedule.schedule',compact('sunday','monday','wednesday','tuesday','thursday','friday','saturday'));
    }

    public function add_schedule(Request $request)
    {
        foreach($request->start_time as $key => $start_time)
        {
        $data = new Schedule;
        $data->start_time = $start_time;
        $data->end_time = $request->end_time[$key];
        $data->md_id = Auth::guard('mddoctor')->id();
        $data->days = $request->type;

        $savedata = $data->save();
    }
        if ($savedata) {
            return response()->json(['status' => true, 'msg' => 'Schdulled  Successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
        }


    }

    public function edit_schedule(Request $request)
    {
        foreach($request->start_time as $key => $start_time)
        {
            $data = ['start_time' => $start_time,
            'end_time' =>  $request->end_time[$key]
        ];
        // echo "<pre>",print_r($data);exit;
            $updatedata = Schedule::where('id',$request->edit_id[$key])->update($data);
        }
        if ($updatedata) {
            return response()->json(['status' => true, 'msg' => 'Schdulled Update Successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
        }
    }

    public function delete_schedule(Request $request)
    {
        $data = Schedule::where('id',$request->id)->delete();
        if ($data) {
            return response()->json(['status' => true, 'msg' => 'Schdulled Delete Successfully']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something Went Wrong']);
        }
    }
}
