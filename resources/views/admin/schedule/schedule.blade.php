@extends('mdview.layout.app')
@section('exrtacss')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('css/upload.css')}}">

<link rel="stylesheet" href="{{asset('build/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('timepicker/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" />
<link rel="stylesheet" href="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">

@endsection
@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Schedule Timings</h4>
                    <div class="profile-box">
                        {{-- <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Timing Slot Duration</label>
                                    <select class="form-select form-control">
                                        <option>-</option>
                                        <option>15 mins</option>
                                        <option selected="selected">30 mins</option>
                                        <option>45 mins</option>
                                        <option>1 Hour</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card schedule-widget mb-0">

                                    <div class="schedule-header">


                                        <div class="schedule-nav">
                                            <ul class="nav nav-tabs nav-justified">
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#slot_sunday">Sunday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link  " data-bs-toggle="tab" href="#slot_monday">Monday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#slot_tuesday">Tuesday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#slot_wednesday">Wednesday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#slot_thursday">Thursday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#slot_friday">Friday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#slot_saturday">Saturday</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>


                                    <div class="tab-content schedule-cont">

                                        <div id="slot_monday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                {{-- href="#add_time_slot" --}}
                                                <a class="edit-link" data-bs-toggle="modal" data-monday="monday" id="monday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            {{-- <p class="text-muted mb-0">Not Available</p> --}}
                                            <h4 class="card-title d-flex justify-content-end">

                                                <a class="edit-link" data-bs-toggle="modal" href="#edit_time_slotm"><i class="fa fa-edit me-1"></i>Edit</a>
                                            </h4>

                                            <div class="doc-times">
                                                @if($sunday->count()>0)
                                                @foreach($monday as $sundays)
                                                <div class="doc-slot-list">
                                                    {{$sundays->start_time}} - {{$sundays->end_time}}
                                                    <a href="javascript:void(0)" data-id="{{$sundays->id}}" class="delete_schedule">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No Data Avalable to Edit</p>
                                                @endif


                                            </div>
                                        </div>




                                        <div id="slot_sunday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                {{-- href="#add_time_slot" --}}
                                                <a class="edit-link" data-bs-toggle="modal" data-sunday="sunday" id="sunday1"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            {{-- <p class="text-muted mb-0">Not Available</p> --}}
                                            <h4 class="card-title d-flex justify-content-end">

                                                <a class="edit-link" data-bs-toggle="modal" href="#edit_time_slot"><i class="fa fa-edit me-1"></i>Edit</a>
                                            </h4>

                                            <div class="doc-times">
                                                @if($sunday->count()>0)
                                                @foreach($sunday as $sundays)
                                                <div class="doc-slot-list">
                                                    {{$sundays->start_time}} - {{$sundays->end_time}}
                                                    <a href="javascript:void(0)" data-id={{$sundays->id}} class="delete_schedule">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No Data Avalable to Edit</p>
                                                @endif


                                            </div>
                                        </div>



                                        <div id="slot_tuesday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                {{-- href="#add_time_slot" --}}
                                                <a class="edit-link" data-bs-toggle="modal" data-tuesday="tuesday" id="tuesday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            {{-- <p class="text-muted mb-0">Not Available</p> --}}
                                            <h4 class="card-title d-flex justify-content-end">

                                                <a class="edit-link" data-bs-toggle="modal" href="#edit_time_slott"><i class="fa fa-edit me-1"></i>Edit</a>
                                            </h4>

                                            <div class="doc-times">
                                                @if($tuesday->count()>0)
                                                @foreach($tuesday as $sundays)
                                                <div class="doc-slot-list">
                                                    {{$sundays->start_time}} - {{$sundays->end_time}}
                                                    <a href="javascript:void(0)" data-id={{$sundays->id}} class="delete_schedule">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No Data Avalable to Edit</p>
                                                @endif


                                            </div>
                                        </div>

                                        <div id="slot_wednesday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                {{-- href="#add_time_slot" --}}
                                                <a class="edit-link" data-bs-toggle="modal" data-wednesday="wednesday" id="wednesday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            {{-- <p class="text-muted mb-0">Not Available</p> --}}
                                            <h4 class="card-title d-flex justify-content-end">

                                                <a class="edit-link" data-bs-toggle="modal" href="#edit_time_slotw"><i class="fa fa-edit me-1"></i>Edit</a>
                                            </h4>

                                            <div class="doc-times">
                                                @if($wednesday->count()>0)
                                                @foreach($wednesday as $sundays)
                                                <div class="doc-slot-list">
                                                    {{$sundays->start_time}} - {{$sundays->end_time}}
                                                    <a href="javascript:void(0)" data-id={{$sundays->id}} class="delete_schedule">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No Data Avalable to Edit</p>
                                                @endif


                                            </div>
                                        </div>



                                        <div id="slot_thursday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                {{-- href="#add_time_slot" --}}
                                                <a class="edit-link" data-bs-toggle="modal" data-thursday="thursday" id="thursday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            {{-- <p class="text-muted mb-0">Not Available</p> --}}
                                            <h4 class="card-title d-flex justify-content-end">

                                                <a class="edit-link" data-bs-toggle="modal" href="#edit_time_slotth"><i class="fa fa-edit me-1"></i>Edit</a>
                                            </h4>

                                            <div class="doc-times">
                                                @if($thursday->count()>0)
                                                @foreach($thursday as $sundays)
                                                <div class="doc-slot-list">
                                                    {{$sundays->start_time}} - {{$sundays->end_time}}
                                                    <a href="javascript:void(0)" data-id={{$sundays->id}} class="delete_schedule">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No Data Avalable to Edit</p>
                                                @endif


                                            </div>
                                        </div>


                                        <div id="slot_friday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                {{-- href="#add_time_slot" --}}
                                                <a class="edit-link" data-bs-toggle="modal" data-friday="friday" id="friday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            {{-- <p class="text-muted mb-0">Not Available</p> --}}
                                            <h4 class="card-title d-flex justify-content-end">

                                                <a class="edit-link" data-bs-toggle="modal" href="#edit_time_slotf"><i class="fa fa-edit me-1"></i>Edit</a>
                                            </h4>

                                            <div class="doc-times">
                                                @if($friday->count()>0)
                                                @foreach($friday as $sundays)
                                                <div class="doc-slot-list">
                                                    {{$sundays->start_time}} - {{$sundays->end_time}}
                                                    <a href="javascript:void(0)" data-id={{$sundays->id}} class="delete_schedule">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No Data Avalable to Edit</p>
                                                @endif


                                            </div>
                                        </div>


                                        <div id="slot_saturday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                {{-- href="#add_time_slot" --}}
                                                <a class="edit-link" data-bs-toggle="modal" data-sunday="saturday" id="saturday"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            {{-- <p class="text-muted mb-0">Not Available</p> --}}
                                            <h4 class="card-title d-flex justify-content-end">

                                                <a class="edit-link" data-bs-toggle="modal" href="#edit_time_slotsat"><i class="fa fa-edit me-1"></i>Edit</a>
                                            </h4>

                                            <div class="doc-times">
                                                @if($saturday->count()>0)
                                                @foreach($saturday as $sundays)
                                                <div class="doc-slot-list">
                                                    {{$sundays->start_time}} - {{$sundays->end_time}}
                                                    <a href="javascript:void(0)" data-id={{$sundays->id}} class="delete_schedule">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No Data Avalable to Edit</p>
                                                @endif


                                            </div>
                                        </div>




                                        {{-- <div id="slot_tuesday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                <a class="edit-link" data-bs-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            <p class="text-muted mb-0">Not Available</p>
                                        </div> --}}


                                        {{-- <div id="slot_wednesday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                <a class="edit-link" data-bs-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            <p class="text-muted mb-0">Not Available</p>
                                        </div> --}}


                                        {{-- <div id="slot_thursday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                <a class="edit-link" data-bs-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            <p class="text-muted mb-0">Not Available</p>
                                        </div> --}}


                                        {{-- <div id="slot_friday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                <a class="edit-link" data-bs-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            {{-- <p class="text-muted mb-0">Not Available</p>
                                        </div> --}}


                                        {{-- <div id="slot_saturday" class="tab-pane fade">
                                            <h4 class="card-title d-flex justify-content-between">
                                                <span>Time Slots</span>
                                                <a class="edit-link" data-bs-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
                                            </h4>
                                            <p class="text-muted mb-0">Not Available</p>
                                        </div> --}}

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>




</div>


<div class="modal fade custom-modal" id="add_time_slot">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Time Slots</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Adddata">
                    <div class="hours-info">
                        <div class="row form-row hours-cont">
                            <div class="col-12 col-md-10">
                                <div class="row form-row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Start Time</label>
                                            <input type="time" name="start_time[]" class="form-control" />
                                            <input type="hidden" id="type" name="type">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <input type="time" name="end_time[]" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-more mb-3">
                        <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div>
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade custom-modal" id="edit_time_slot">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Time Slots</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editschdule">
                    <div class="hours-info">
                        <div class="row form-row hours-cont">
                            <div class="col-12 col-md-10">
                                @foreach($sunday as $sundays)
                                <div class="row ">
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label>Start Time</label>

                                            <input type="time" name="start_time[]" class="form-control" value={{$sundays->start_time}} />
                                            <input type="hidden" value="{{$sundays->id}}" name="edit_id[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <input type="time" class="form-control" name="end_time[]" value={{$sundays->end_time}} />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                    {{-- <div class="add-more mb-3">
                        <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div> --}}
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade custom-modal" id="edit_time_slotm">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Time Slots</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editschdule">
                    <div class="hours-info">
                        <div class="row form-row hours-cont">
                            <div class="col-12 col-md-10">
                                @foreach($monday as $sundays)
                                <div class="row ">
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label>Start Time</label>

                                            <input type="time" name="start_time[]" class="form-control" value={{$sundays->start_time}} />
                                            <input type="hidden" value="{{$sundays->id}}" name="edit_id[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <input type="time" class="form-control" name="end_time[]" value={{$sundays->end_time}} />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                    {{-- <div class="add-more mb-3">
                        <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div> --}}
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade custom-modal" id="edit_time_slott">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Time Slots</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editschdule">
                    <div class="hours-info">
                        <div class="row form-row hours-cont">
                            <div class="col-12 col-md-10">
                                @foreach($tuesday as $sundays)
                                <div class="row ">
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label>Start Time</label>

                                            <input type="time" name="start_time[]" class="form-control" value={{$sundays->start_time}} />
                                            <input type="hidden" value="{{$sundays->id}}" name="edit_id[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <input type="time" class="form-control" name="end_time[]" value={{$sundays->end_time}} />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                    {{-- <div class="add-more mb-3">
                        <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div> --}}
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade custom-modal" id="edit_time_slotw">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Time Slots</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editschdule">
                    <div class="hours-info">
                        <div class="row form-row hours-cont">
                            <div class="col-12 col-md-10">
                                @foreach($wednesday as $sundays)
                                <div class="row ">
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label>Start Time</label>

                                            <input type="time" name="start_time[]" class="form-control" value={{$sundays->start_time}} />
                                            <input type="hidden" value="{{$sundays->id}}" name="edit_id[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <input type="time" class="form-control" name="end_time[]" value={{$sundays->end_time}} />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                    {{-- <div class="add-more mb-3">
                        <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div> --}}
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade custom-modal" id="edit_time_slotth">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Time Slots</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editschdule">
                    <div class="hours-info">
                        <div class="row form-row hours-cont">
                            <div class="col-12 col-md-10">
                                @foreach($thursday as $sundays)
                                <div class="row ">
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label>Start Time</label>

                                            <input type="time" name="start_time[]" class="form-control" value={{$sundays->start_time}} />
                                            <input type="hidden" value="{{$sundays->id}}" name="edit_id[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <input type="time" class="form-control" name="end_time[]" value={{$sundays->end_time}} />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                    {{-- <div class="add-more mb-3">
                        <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div> --}}
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade custom-modal" id="edit_time_slotf">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Time Slots</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editschdule">
                    <div class="hours-info">
                        <div class="row form-row hours-cont">
                            <div class="col-12 col-md-10">
                                @foreach($friday as $sundays)
                                <div class="row ">
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label>Start Time</label>

                                            <input type="time" name="start_time[]" class="form-control" value={{$sundays->start_time}} />
                                            <input type="hidden" value="{{$sundays->id}}" name="edit_id[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <input type="time" class="form-control" name="end_time[]" value={{$sundays->end_time}} />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                    {{-- <div class="add-more mb-3">
                        <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div> --}}
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade custom-modal" id="edit_time_slotsat">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Time Slots</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editschdule">
                    <div class="hours-info">
                        <div class="row form-row hours-cont">
                            <div class="col-12 col-md-10">
                                @foreach($saturday as $sundays)
                                <div class="row ">
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label>Start Time</label>

                                            <input type="time" name="start_time[]" class="form-control" value={{$sundays->start_time}} />
                                            <input type="hidden" value="{{$sundays->id}}" name="edit_id[]" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <input type="time" class="form-control" name="end_time[]" value={{$sundays->end_time}} />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                    {{-- <div class="add-more mb-3">
                        <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div> --}}
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('exrtajs')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
<script type="text/javascript">
    //Timepicker
    if (jQuery().timepicker && $(".timepicker").length) {

        $(".timepicker").timepicker({
            format: 'H:i:s',
            icons: {
                up: "fas fa-chevron-up",
                down: "fas fa-chevron-down"
            }
        });
    }

    $(".add-hours").on('click', function() {

        var hourscontent = '<div class="row form-row hours-cont">' +
            '<div class="col-12 col-md-10">' +
            '<div class="row form-row">' +
            '<div class="col-12 col-md-6">' +
            '<div class="form-group">' +
            '<label>Start Time</label>' +

            '<input type="time"  id="example" name="start_time[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '<div class="col-12 col-md-6">' +
            '<div class="form-group">' +
            '<label>End Time</label>' +

            '<input type="time" id="example1" name="end_time[]" class="form-control">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
            '</div>';

        $(".hours-info").append(hourscontent);
        return false;
    });
    $(".hours-info").on('click', '.trash', function() {
        $(this).closest('.hours-cont').remove();
        return false;
    });
    $(function() {
        $('#example').timepicker();
        $('#example1').timepicker();
    });

    $('#sunday1').on('click', function(e) {
        e.preventDefault();
        let sunday = $(this).data('sunday');
        $('#type').val(sunday);
        $('#add_time_slot').modal('show');
    })



    $('#Adddata').submit(function(e) {

        e.preventDefault();
        var fd = new FormData(this);
        fd.append('_token', "{{ csrf_token() }}");
        $.ajax({
            type: 'POST',
            url: "{{ route('mddoctor.add.schdule')}}",
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

    $('#editschdule').submit(function(e) {

        e.preventDefault();
        var fd = new FormData(this);
        fd.append('_token', "{{ csrf_token() }}");
        $.ajax({
            type: 'POST',
            url: "{{ route('mddoctor.edit.schdule')}}",
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
                    $("#editschdule")[0].reset();
                    $('#edit_time_slot').modal('toggle');
                    $('#edit_time_slotm').modal('toggle');
                    $('#edit_time_slott').modal('toggle');
                    $('#edit_time_slotw').modal('toggle');
                    $('#edit_time_slotth').modal('toggle');
                    $('#edit_time_slotf').modal('toggle');
                    $('#edit_time_slotsat').modal('toggle');




                } else {
                    iziToast.error({
                        message: result.msg,
                        position: 'topRight'
                    });
                    $("#editschdule")[0].reset();
                    $('#edit_time_slot').modal('toggle');
                }
            },

        });
    });

    $('#monday').on('click', function(e) {
        e.preventDefault();
        let monday = $(this).data('monday');
        $('#type').val(monday);
        $('#add_time_slot').modal('show');
    })

    $('#tuesday').on('click', function(e) {
        e.preventDefault();
        let tuesday = $(this).data('tuesday');
        $('#type').val(tuesday);
        $('#add_time_slot').modal('show');
    })
    $('#wednesday').on('click', function(e) {
        e.preventDefault();
        let wednesday = $(this).data('wednesday');
        $('#type').val(wednesday);
        $('#add_time_slot').modal('show');
    })
    $('#thursday').on('click', function(e) {
        e.preventDefault();
        let thursday = $(this).data('thursday');
        $('#type').val(thursday);
        $('#add_time_slot').modal('show');
    })
    $('#friday').on('click', function(e) {
        e.preventDefault();
        let friday = $(this).data('friday');
        $('#type').val(friday);
        $('#add_time_slot').modal('show');
    })
    $('#saturday').on('click', function(e) {
        e.preventDefault();
        let saturday = $(this).data('saturday');
        $('#type').val(saturday);
        $('#add_time_slot').modal('show');
    })


    $('.delete_schedule').on('click', function(e) {
        let body = $(this).parent();

        let id = $(this).data('id');
        var fd = new FormData();
        fd.append('_token', "{{ csrf_token() }}");
        fd.append('id', id);
        var r = confirm("are you sure want to delete!");
        if (r == true) {
            $.ajax({
                type: 'POST',
                // url: "{{ url('admin/plan/plandelete')}}",
                url: "{{ route('mddoctor.delete.schdule')}}",

                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: (result) => {
                    $('.close-edit').click();
                    if (result.status) {

                        iziToast.success({
                            message: result.msg,
                            position: 'topRight'
                        });
                        window.location.reload();
                    } else {
                        iziToast.error({
                            message: result.msg,
                            position: 'topRight'
                        });

                    }


                }

            });
        } else {

        }
    })
</script>
@endsection
@endsection