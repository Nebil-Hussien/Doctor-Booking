@extends('admin.layout.app')

@section('extra_css')
<style>
    /* Hiding the checkbox, but allowing it to be focused */
    .badgebox {
        opacity: 0;
    }

    .badgebox+.badge {
        /* Move the check mark away when unchecked */
        text-indent: -999999px;
        /* Makes the badge's width stay the same checked and unchecked */
        width: 27px;
    }

    .badgebox:focus+.badge {
        /* Set something to make the badge looks focused */
        /* This really depends on the application, in my case it was: */

        /* Adding a light border */
        box-shadow: inset 0px 0px 10px;
        /* Taking the difference out of the padding */
    }

    .badgebox:checked+.badge {
        /* Move the check mark back when checked */
        text-indent: 0;
        font-size: 18px;
    }
</style>
@endsection
@section('content')
@php

/**
* @This Method use to enter module and submodules which are newly created in erp for assigns the privileges to the users
*/

/** @module list array */

$modules = [ '1' => 'Dashboard',
'2' => 'Register',
'3' => 'Approve-Register',
'4' => 'Role-Creation',
'5' => 'Report' ,
'6' => 'Services',
'7' => 'Staff' ,
];

/** @submodule list array */

$submodule = [
'Dashboard' => [
'1' => 'Dashboard',
],
'Register' => [
'1' => 'Senior Doctor',
'2' => 'Doctors',
'3' => 'Patients',

],
'Approve-Register' => [
'1' => 'Senior Doctor',
'2' => 'Doctors',
],
'Role-Creation' => [
'1' => 'Role Creation',
],
'Report' => [
'1' => 'Report',
],
'Services' => [
'1' => 'Services',
],
'Staff' => [
'1' => 'Staff',
],

];

@endphp
<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="col-md-12 col-lg-12 col-xl-12">

            <div class="card">
                <div class="card-body">
                    <a href="" style="text-decoration: none" class="btn btn-xs btn-success m-2 float-left" title="Back"><i class="fa fa-arrow-left"> </i></a>
                    <br>
                    <form  id="privileges">
                        <input type="hidden" name="role_id" value="{{$id}}">
                        <table class="table table-responsive" id="privilege-list" style="width: 100%">
                            <thead>
                                <tr class="text-center">
                                    <th>Check</th>
                                    <th>Module</th>
                                    <th>Privilage</th>
                                </tr>
                            </thead>
                            @foreach($modules as $key =>$obj)
                            <tbody class="text-center">

                                <tr>
                                    <td>
                                        <input type="checkbox" name="module[]" value="{{$key}}" {{Helper::checkedpermission($id,$key) =='1'?'checked':''}} class="form-check-input" id="customControlValidation1" >
                                    </td>
                                    <td><b>{{$obj}}</b></td>
                                    <td style="width: 70%">
                                        <p>
                                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample{{$obj}}" role="button" value="{{$key}}" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </p>
                                        <div class="row">
                                            <div class="col">
                                                <div class="collapse" id="collapseExample{{$obj}}">
                                                    <div class="card card-body">
                                                        @foreach($submodule as $key1 => $items1)
                                                        @if($key1 === $obj)
                                                        <table class="table table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Sub modules</th>
                                                                    <th>Access</th>
                                                                </tr>
                                                            </thead>
                                                            @foreach($items1 as $key3 => $items2)
                                                            <tbody>
                                                                {{-- <tr>submodule{{$key}}[] --}}
                                                                    <td> <input type="checkbox"  name="submodule{{$key}}[]" {{Helper::checkedpermission3($id,$key,$key3) ==''?'':'checked'}} value="{{$key3}}" class="form-check-input" id="customControlValidation1" >
                                                                    </td>
                                                                    <td>{{$items2}}</td>
                                                                    {{-- access{{$key.$key3}}[]  access{{$key.$key3}}[] --}}
                                                                    <td> <select class="form-control" name="access{{$key.$key3}}[]" onchange="$.fn.showaccess(this.value , 'writeAcc{{$key.$key3}}')">
                                                                            <option value="">Please Select</option>
                                                                            <option value="Read" {{Helper::checkedpermission3($id,$key,$key3) =='Read'?'selected':''}}>Read</option>
                                                                            <option value="Write" {{Helper::checkedpermission3($id,$key,$key3) =='Write'?'selected':''}}>Write</option>
                                                                        </select>
                                                                        <br>

                                                                    </td>


                                                                </tr>
                                                            </tbody>
                                                            @endforeach

                                                        </table>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>


                            </tbody>
                            @endforeach
                        </table>

                        <div class="modal-footer center">
                            <span class="error"></span>
                            <a href="" class="btn cancel-button" data-dismiss="modal">Cancel</a> <button type="submit" class="btn btn-success add_privilege add-button"  id="saveData"> <i class="fa fa-spinner fa-spin " id="spin-privilege-add"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>



</div>



@endsection
@section('exrtajs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

    $('#privileges').on('submit',function(e) {

e.preventDefault();
var fd = new FormData(this);
fd.append('_token', "{{ csrf_token() }}");
$.ajax({
    type: 'POST',
    url: "{{ route('admin.add.permission')}}",
    data: fd,
    cache: false,
    contentType: false,
    processData: false,
    success: function(result) {

if (result.status) {

    iziToast.success({
        message: result.msg,
        position: 'topRight'
    });
    window.location.reload();
    $("#Adddata")[0].reset();
    $('#add_time_slot').modal('toggle');



} else {
    iziToast.error({
        message: result.msg,
        position: 'topRight'
    });
    $("#Adddata")[0].reset();
    $('#add_time_slot').modal('toggle');
}
},

});
});
</script>

@endsection
