@extends('userview.layout.app')
@section('exrtacss')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

<link rel="stylesheet" href="{{asset('build/css/demo.css')}}">
<style>
    .container123 {
        border: 2px solid #ccc;
        width: 570px;
        height: 137px;
        overflow-y: scroll;
    }

    /* input[type="date"]::-webkit-calendar-picker-indicator {
  background: transparent;
  bottom: 0;
  color: transparent;
  cursor: pointer;
  height: auto;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  width: auto;
} */
</style>
@endsection
@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
    <h2>Appointment Form</h2>


    <div class="card">

        <div class="card-body">

            <form class="appointment" action="#" method="post">
                <div class="row form-row">

                    <!-- <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Patience Type</label>
                            <select class="form-select form-control" name="gender" id="typePat">
                                <option>me</option>
                                <option>family</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>No. Of Patients</label>
                            <input type="number" class="form-select form-control" placeholder="No Of Patients" id="patientNumber" name="noPatients" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 ">
                        <div class="form-group">
                            <label>Services</label>
                            <select class="form-select form-control  " name="service" id="service123" required>
                                <option placeholder="">select Service</option>
                                @if(count($service) > 0 )
                                @foreach($service as $key => $obj)
                                <option value="{{$obj->id}}" data-id="{{$obj->price}}">{{$obj->service}}</option>
                                @endforeach @else <option>No Family Member</option>
                                @endif

                            </select>

                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label>Select Date</label>
                                    <input type="text" name="picDate" class="form-select form-control" required placeholder="Select the Pickup Date" id="datepicker">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label>Select Time</label>
                                    <input type="time" name="picTime" class="form-select form-control" required placeholder="Select the Pickup time" id="patientNumber">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 ">
                        <div class="form-group">
                            <label>Patience Name</label>
                            <div class="container123 form-control ">
                                <input type="hidden" name="id" value="{{Auth()->guard('user')->user()->id}}">

                                <input type="checkbox" name="checkbox[]" class="check" style="width:15px;height:15px" value="{{Auth()->guard('user')->user()->id}}/user"> {{Auth()->guard('user')->user()->name}}</br>


                                @if(count($userFamily) > 0 )

                                @foreach($userFamily as $key => $obj)
                                <input type="checkbox" name="checkbox[]" class="check" style="width:15px;height:15px" value="{{$obj->id}}/family"> {{$obj->name}}</br>


                                </label>
                                @endforeach

                                @else
                                <input type="text" readonly>No Family Member</input>
                                @endif
                            </div>


                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Payment Mode</label>
                            <select class="form-select form-control " required name="payment">
                                <option value="cod">COD</option>
                                <option value="online">ONLINE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-none" id="priceService">
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control " id="servicePrice" name="amount" placeholder="" readonly></input>

                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn p-1">Save Changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
</div>
</div>

@section('exrtajs')
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
    $(function() {

        $("#datepicker").datepicker({
            dateFormat: 'yy/mm/dd',
            changeMonth: true,
            changeYear: true,
            minDate: '-0d'

        });
    });
    $('.check').click(function() {
        const fruits = [];
        let noPerson = $('#patientNumber').val();
        if ($('input[type="checkbox"].check:checked').length > noPerson) {
            $(this).prop('checked', false)
            iziToast.error({
                message: 'Increase Number Of Patient',
                position: 'topRight'
            });

        };

    })
    $(document).ready(function() {

        $('#datepicker').datepicker('show')

        $('#typePat').on('change', function() {

            if ($('#typePat').val() == 'family') {
                $('#familyCheck').removeClass('d-none');
                $('#familyCheckMe').addClass('d-none');
            } else {

                $('#familyCheckMe').removeClass('d-none');
                $('#familyCheck').addClass('d-none');
            }
        });
        $('#service123').on('change', function(e) {
            e.preventDefault();
            let service = $(this).find(":selected").data('id');
            let noPerson = $('#patientNumber').val();
            let price = service * noPerson;
            if (noPerson > '0') {
                $('#servicePrice').val(price);
                $('#priceService').removeClass('d-none');
                return;
            }

            iziToast.error({
                message: 'Increase Number Of Patient',
                position: 'topRight'
            });

        });
        $('#patientNumber').keyup(function() {
            let noPerson = $('#patientNumber').val();
            let service = $('#service123').find(":selected").data('id');
            if (service > '0') {
                let amount = service * noPerson;
                if (noPerson > '0') {
                    $('#servicePrice').val(amount);
                    $('#priceService').removeClass('d-none');
                    return;
                }
            }


        })



        $('.appointment').submit(function(e) {

            e.preventDefault();
            var fd = new FormData(this);
            let noPerson = $('#patientNumber').val();
            if ($('input[type="checkbox"].check:checked').length < noPerson) {

                iziToast.error({
                    message: 'Pactient Selecte is less or chnge the no of patient',
                    position: 'topRight'
                });
                return false;
            };

            fd.append('_token', "{{ csrf_token() }}");



            $.ajax({
                url: "{{ route('user.appointment.create.data') }}",
                type: "post",
                data: fd,
                dataType: "JSON",
                processData: false,
                contentType: false,
                // beforeSend: function() {
                //     //  $('.generalsets').prop('disabled', true);
                // },
                success: function(result) {

                    if (result.status === true) {

                        iziToast.success({
                            message: result.msg,
                            position: 'topRight'
                        });
                        setInterval(location.reload(), 10000);

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
@endsection