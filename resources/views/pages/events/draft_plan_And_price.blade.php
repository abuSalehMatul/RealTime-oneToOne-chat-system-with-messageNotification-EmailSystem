@extends('layouts.app')
@section('custom-styles')
{{-- <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.css') }}"> --}}

<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

@endsection
@section('content')
<section id="section-sidebar-left">
  <div class="container">
      {{-- @if($id == "")
      <input type="text" name="id" value="{{$id}}">
  @endif --}}
    <div class="row">
      <div class="col-md-3">
        <div class="form-row">
          <div class="form-group col-md-10 m-auto text-center">
            <img id="user_avatar_img" src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}"
            style="width:100px; height:100px; border-radius:50%;;margin-left: -62px;">
          </div>
          <form id="search-user" action="{{ URL('/search') }}" method="GET" role="search">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div class="form-group col-md-10 m-auto">
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
              <div class="input-group" style="width: 297px;margin-left: -78px;">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input class="form-control" id="find_email" name="find_email" type="search" placeholder="Search" aria-label="Search" value="{{ old('find_email') }}">
                <div class="input-group-append">
                  <button class="btn btn-secondary search_user" type="submit" id="button-addon2">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <br>
           
                <div class="row cal" style="margin-left:-40px">
                    <div class="col-md-8 ">
                        <div class="example1" style="margin:0 auto;margin-left: -25px !important;"></div>
                    </div>
                </div>
      
        <br>
        <div class="col-md-12" style="border:1px solid gray;padding-bottom:5px;padding-top:20px;padding-left:0px;padding-right:0px;width:295px !important;margin-left:-46px !important;max-width:295px">
         
            <div class="ul-schedule-list" style="border-bottom:1px solid gray;padding-bottom: 10px;">
                <ul class="ul-schedule-list">
                  <li class="" >
                    <a href="/events"><i class="fas fa-square"></i> &nbsp; All Events</a>
                  </li>
                </ul>
            </div>
            <div class="ul-schedule-list" style="border-bottom:1px solid gray;padding-top: 20px;padding-bottom: 20px;">
                <ul class="ul-schedule-list">
                    <li class="" style="padding-bottom: 10px;">
                      <a href=""><i class="fa fa-circle" style="color: pink;" aria-hidden="true"></i> &nbsp; Club Events</a>
                    </li>
                    <li class="">
                        <a href=""><i class="fa fa-circle" style="color: blue;" aria-hidden="true"></i> &nbsp; Club Member Events</a>
                      </li>
                  </ul>
            </div>

            <div class="ul-schedule-list" style="border-bottom:1px solid gray;padding-top: 20px;padding-bottom: 20px;">
                <ul class="ul-schedule-list">
                    <li class="" style="padding-bottom: 10px;" >
                      <a href=""><i class="fa fa-circle" style="color: purple;" aria-hidden="true"></i> &nbsp;Events Opened by Me</a>
                    </li>
                    <li class="">
                        <a href=""><i class="fa fa-circle" style="color: yellow;" aria-hidden="true"></i> &nbsp;Waiting for my approval</a>
                      </li>
                  </ul>
            </div>
            <div class="ul-schedule-list" style="border-bottom:1px solid gray;padding-top: 20px;padding-bottom: 20px;">
                <ul class="ul-schedule-list">
                    <li class="" style="padding-bottom: 10px;">
                      <a href=""><i class="fa fa-circle" style="color: red;" aria-hidden="true"></i> &nbsp;I am waiting for approval</a>
                    </li>
                    <li class="" >
                        <a href=""><i class="fa fa-circle" style="color: green;" aria-hidden="true"></i> &nbsp; Event Booked By Me</a>
                      </li>
                  </ul>
            </div>
            <div class="ul-schedule-list" style="border-bottom:1px solid gray;padding-top: 15px;padding-bottom: 15px;">
                <ul class="ul-schedule-list">
                  <li class="" >
                      <a href="{{ route('events.create') }}">  <i class="fas fa-plus"></i> &nbsp Add new Event</a>
                  </li>
                  <li class="" >
                      <a href="{{ route('events.create') }}">  <i class="fas fa-save"></i> &nbsp Draft Events</a>
                  </li>
                </ul>
            </div>
            <div class="ul-schedule-list" style="padding-top: 20px;padding-bottom: 20px;">
                <ul class="ul-schedule-list">
                  <li class="" >
                    <a href=""><i class="fas fa-certificate"></i> &nbsp; My Availability</a>
                  </li>
                </ul>
            </div>
            
        
        
    </div>
      </div>
      <div class="col-md-9">
            {!! Form::open(array('id'=>'eventM_form' , 'route' => 'eventM.store', 'files' => true)) !!}
            @csrf
      <input name="event" value="{{$event->id}}" hidden>
          <div class="container addEvent" style="border:2px solid gray;padding-bottom:5px">
            <div class="col-md-12">
              <div class="mt-3">
                  <a href="{{ URL('/events') }}"><i class="fa fa-times-circle fl-r crs-pntr" style="font-size:27px;color:#6c757d;"></i></a>
                  <div class="img-upload " style="border-radius: 0px !important;text-align:center;padding-left:30px" >
                        <img width="1000" height="300" id="modal_image_preview" src="/uploads/avatars/picture-01-512.png" alt="Image"  class="img-responsive"/>
                        <span class="hide">
                        {{-- {!! Form::file('event_modal_image', ['id'=>'event_modal']) !!} --}}
                        <input class="form-control" type="file" id="event_modal" name="event_modal_image" >
  
                        </span>
                    </div>
                
                 <div><hr id="event-border"></div>
                 <div class="row event-content">
                  
                   
                   
                 </div>
                 <div><hr id="event-border"></div>
             </div>
             <div class="row mb-3">
               <div class="col-md-10">
               
               </div>
            </div>
            </div>
            <div class="col-md-12">
              <div class="card ">
                    <div class="input-group">
                            <div class="container">
                              <div class="row">
                                  <div class="col-sm-2 m-0 p-0 ml-1">
                                      <div class="form-group">
                                          <div class="input-group date" id="datetimepicker5" data-target-input="nearest">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                            </div>
                                              <input type="text" id="datetimepicker5" class="form-control form-control-sm datetimepicker-input" placeholder="Date" name="event_date" data-toggle="datetimepicker" data-target="#datetimepicker5"/>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-3 m-0 p-0 ml-3">
                                    <div class="form-group row">
                                      <div class="col-sm-6 m-0 p-0 input-group date" id="datetimepicker3" data-target-input="nearest">
                                          <input type="text" placeholder="Start" name="event_start_time" class="form-control form-control-sm datetimepicker-input" data-target="#datetimepicker3" data-toggle="datetimepicker"/>
                                      </div>
                                      <div class="col-sm-6 m-0 p-0 input-group date" id="datetimepicker4" data-target-input="nearest">
                                          <input type="text" placeholder="End" name="event_end_time" class="form-control form-control-sm datetimepicker-input" data-target="#datetimepicker4" data-toggle="datetimepicker"/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-2 m-0 p-0 ml-1">
                                      <div class="form-group">
                                          <div class="input-group date">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fas fa-ticket-alt"></i></div>
                                            </div>
                                              <input type="text" class="form-control form-control-sm" name="event_ticket_price"  placeholder="Price" id="event_ticket_price">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-3 m-0 p-0 ml-1">
                                      <div class="form-group">
                                          <div class="input-group date">
                                              <input type="text" class="form-control form-control-sm" name="event_details"  placeholder="Details" id="event_detail">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-1 m-0 p-0 ml-1">
                                      <div class="form-group">
                                        <button type="submit" name="button" class="btn btn-primary btn-sm" id="add_event_options">
                                          <i class="fas fa-plus"></i> Add
                                        </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                {{-- <div class="card-header" style="background-color:darkslategray"> --}}
                  {{-- <div class="row">
                      <div class="col-md-12 ">
                          <input type="text" id="event_address" class="form-control{{ $errors->has('event_address') ? ' is-invalid' : '' }}"
                          placeholder="Address" name="event_address"  value="{{ old('event_address') }}">
                      </div> --}}
                  {{-- </div> --}}
                  <br>
                  {{-- <div class="row">
                        <div class="col-md-3"> --}}
                            {{-- <div class="btn btn-default btn-sm " data-toggle="modal" data-target="#eventModal" style="background-color:white;border:1px solid">
                                <i class="fas fa-list-ul fa-1x"></i> Plan & Price
                            </div> --}}
                            {{-- <div class="custom-control custom-checkbox  mt-2">
                                <input type="checkbox" class="custom-control-input" id="no_need_approval" name="no_need_approval">
                                <label class="custom-control-label" for="no_need_approval">No Refund</label>
                              </div>
                            <div class="custom-control custom-checkbox  mt-2">
                                <input type="checkbox" class="custom-control-input" id="need_approval" name="need_approval">
                                <label class="custom-control-label" for="need_approval">Approval needed</label>
                              </div>
                             
                        </div>  
                        
                        <div class="col-md-2">  
                          <img id="user_avatar_img" src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}"
                          style="width:50px; height:50px; border-radius:50%;"><br>
                          <span>Name </span><br><span>23-11-2018</span><br><span>Opened</span>
                        </div>
                        <div class="col-md-2">
                          <img id="user_avatar_img" src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}"
                          style="width:50px; height:50px; border-radius:50%;"><br>
                          <span>Name </span><br><span>23-11-2018</span><br><span>Edited</span>
                        </div> --}}
                   
                  
                  
{{--                  
                      <div class="col-md-2">
                        <div class="custom-control custom-checkbox float-right mt-2">
                            <input type="checkbox" class="custom-control-input" id="no_need_approval" name="no_need_approval">
                            <label class="custom-control-label" for="no_need_approval">No Refund</label>
                          </div>
                      </div> --}}
                      {{-- <div class="col-md-2">  
                          <div class="custom-control custom-checkbox float-right mt-2">
                           <input type="checkbox" class="custom-control-input" id="need_approval" name="need_approval">
                           <label class="custom-control-label" for="need_approval">Approval needed</label>
                         </div>
                      </div> --}}
                         {{-- <div class="col-md-5">
                          
                          <div class="form-group" style="float:right">
                                  <select class="btn btn-outline-secondary" id="event_type" aria-label="event_type" name="event_type">
                                    <option selected>Event Type</option>
                                    <option value="private_event">Private Event</option>
                                    <option value="public_event">Public Event</option>
                                  </select>
                          </div> --}}
                                  {{-- <div class="form-group">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text">
                                            <img id="user_avatar_img" src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}"
                                            style="width:20px; height:30px; border-radius:0%;">
                                          </div>
                                        </div>
                                        <input class="form-control " style="height:50px" id="find_email" name="find_email" type="search" placeholder="Search" aria-label="Search">
                                        <div class="input-group-append">
                                          <button class="btn btn-outline-secondary search_user" type="button" id="button-addon2">
                                            <i class="fas fa-search"></i>
                                          </button>
                                          <button type="submit" name="button" class="btn btn-outline-secondary">Invite</button>
                                        </div>
                                      </div>
                                    </div> --}}
                             
                          {{-- </div> --}}
                        
                  {{-- </div> --}}
                  {{-- <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <img id="user_avatar_img" src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}"
                                style="width:30px; height:30px; border-radius:0%;">
                              </div>
                            </div>
                            <input class="form-control form-control-lg" id="find_email" name="find_email" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary search_user" type="button" id="button-addon2">
                                <i class="fas fa-search"></i>
                              </button>
                              <button type="submit" name="button" class="btn btn-outline-secondary">Invite</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> --}}
                {{-- </div> --}}
               
                    {{-- <hr id="event-border"> --}}
                    {{-- <div class="form-group">
                      <textarea class="form-control" id="event_description" name="event_description" rows="5"></textarea>
                    </div> --}}
                    {{-- <div class="form-group but" style="float:right !important;padding-left:300px">
                        <button type="submit" class="btn  btn-outline-secondary" ><i class="fas fa-plus"></i>&nbsp Publish Event</button>&nbsp --}}
                        {{-- <button type="submit" class="btn btn-outline-secondary" ><i class="fa fa-edit"></i>&nbspEdit</button>&nbsp --}}

                        {{-- <button type="submit" class="btn btn-outline-secondary " ><i class="fa fa-trash" aria-hidden="true"></i>&nbspDelete</button>&nbsp --}}
                    {{-- </div> --}}
                  </form>
                </div>
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Event Modal -->

@endsection
@section('extra-JS')
<script src="{{ asset('js/jquery.supercal.js')}}"></script> 
<script>
  var dateToday = new Date();
  $('.example1').supercal({
				transition: 'carousel-vertical'
			});
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#event_featured_image_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }

  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#modal_image_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }

  $("#modal_image_preview").click(function () {
    $("#event_modal").trigger('click');
  });

  $('#event_modal').on('change', function () {
	    	if (this.files && this.files[0]) {
			    var reader = new FileReader();
			    reader.onload = function(e) {
			      $('#modal_image_preview').attr('src', e.target.result);
			    }
			    reader.readAsDataURL(this.files[0]);
			}	
	    });

  $("#event_featured_image_name").change(function(){
    readURL(this);
  });
  $("#event_featured_image_preview").click(function () {
    $("#event_featured_image_name").trigger('click');
  });
  $('#event_featured_image_name').on('change', function () {
	    	if (this.files && this.files[0]) {
			    var reader = new FileReader();
			    reader.onload = function(e) {
			      $('#event_featured_image_preview').attr('src', e.target.result);
			    }
			    reader.readAsDataURL(this.files[0]);
			}	
	    });

  $("#event_host_image").click(function () {
    $("#event_host_image_name").trigger('click');
  });

  $('#event_featured_image_name').on('change', function() {
    var val = $(this).val();
    $(this).siblings('span.event_featured_image_name').text(val);
  });

  $('#event_host_image_name').on('change', function() {
    var val = $(this).val();
    $(this).siblings('span.event_host_image_name').text(val);
  });

  $('#event_options').hide();
  $("#add_event_options").click(function(){
    $("#event_options").show();
  });

  $('#remove_event_option').click(function(){
    $("#event_options").hide();
  });


  $('#event-going').on('click', check);

  function check(e) {
    $('.fa').toggleClass('fa-check-square');
  }

</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT',
        });
    });
    $(function () {
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('#datetimepicker5').datetimepicker({
            format: 'L',
            minDate: new Date()
            
        });
    });
    $(function () {
        $('#datetimepicker13').datetimepicker({
            inline: true,
            sideBySide: false,
            buttons:{
                showToday:true
            }
        });
    });
$('#no_refund').prop('indeterminate', true)
</script>
<!-- Wysiwyg editor tinymce-->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
  tinymce.init({
    selector: 'textarea',
    plugins: "link code wordcount",
    menubar: 'false'
  });

  
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

</script>
@endsection
