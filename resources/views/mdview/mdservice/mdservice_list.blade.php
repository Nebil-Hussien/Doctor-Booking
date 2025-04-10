@extends('mdview.layout.app')
@section('exrtacss')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('css/upload.css')}}">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<link rel="stylesheet" href="{{asset('build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('build/css/demo.css')}}">
<style>
    .fx_width {
        width: 150px;
        /* padding:5px */

    }
</style>
@endsection
@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">


    <div class="card">
        <div class="card-body">
            <a href="" style="text-decoration: none" class="btn btn-xs btn-success m-2 float-left" title="Back"><i class="fa fa-arrow-left"> </i></a>
            <br>
            <form action="#" id="setservices">
                <input type="hidden" name="staff_id" value="">
                <table class="table table-responsive" id="privilege-list" style="width: 100%">
                    <thead>
                        <tr class="text-center">
                            <th>Check</th>
                            <th>Service</th>
                            <th>Price</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach($service as $key => $services)

                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-input" {{Helper::helperForChecked($services->id,$id) =='1'?'checked':''}} name="service_id[]" value="{{$services->id}}">

                            </td>
                            <td><b>{{$services->service}}</b></td>
                            <td><b>{{$services->price}}</b></td>

                        </tr>

                        @endforeach


                    </tbody>

                </table>

                <div class="modal-footer center">
                    <span class="error"></span>
                    <a href="" class="btn cancel-button" data-dismiss="modal">Cancel</a> <button type="submit" class="btn btn-success add_privilege add-button" id="saveData"> <i class="fa fa-spinner fa-spin " id="spin-privilege-add"></i> Save</button>
                </div>
            </form>
        </div>
    </div>



</div>
@endsection

@section('exrtajs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    $(function() {

        $('#setservices').submit(function(e) {
            e.preventDefault();
            var fd = new FormData(this);
            fd.append('_token', "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('admin.mdservices.add') }}",
                type: "post",
                data: fd,
                dataType: "JSON",
                processData: false,
                contentType: false,
                beforeSend: function() {
                    //  $('.generalsets').prop('disabled', true);
                },
                success: function(result) {

                    if (result.status === true) {
                        iziToast.success({
                            message: result.msg,
                            position: 'topRight'
                        });
                        setInterval(location.reload(), 10000);

                        // window.location.href = "{{route('md.dashboard')}}";
                    } else {
                        iziToast.error({
                            message: result.msg,
                            position: 'topRight'
                        });

                    }
                }
            })

        });


    });
</script>


@endsection