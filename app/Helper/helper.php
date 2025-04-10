<?php

namespace App\Helper;


use App\Models\Activitylog;
use App\Models\Doctorservice;
use App\Models\Hotelamenities;
use App\Models\Privilege;

use Request;

class Helper
{

    public static function addToActivities($subject = null, $userid = null, $type = null, $url = null, $ip = null, $method = null)
    {

        $saveActivity = new Activitylog();
        $activities['subject'] = $subject;
        $activities['url'] = $url;
        $activities['method'] = $method;
        $activities['ip'] = $ip;
        $activities['user_id'] =  $userid ? $userid : 1;
        $activities['type']  = $type;
        $activities['created_by'] = $userid;
        // dd($activities);

        $value =  $saveActivity->fill($activities)->save();
    }

    public static function helperForChecked($key, $id)
    {
       $value =Doctorservice::where('md_id',  $id)->where('service_id',$key)->count() ;
       if($value > 0){
           return true;
       }

    }

    public static function checkedpermission($role_id ,$key)
    {
       $value =Privilege::where('role_id',  $role_id)->where('module',$key)->count();
       if($value > 0){
           return true;
       }

    }

    public static function checkedpermission3($role_id ,$key,$key3)
    {
       $value =Privilege::where('role_id',  $role_id)->where('module',$key)->where('submodule',$key3)->first();
       if(!empty($value)){
           return $value->access;
       }

    }


}
