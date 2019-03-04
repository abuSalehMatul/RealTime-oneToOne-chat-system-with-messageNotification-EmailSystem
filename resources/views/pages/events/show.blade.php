@extends('layouts.app')
@section('custom-styles')
<link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.css') }}">
<style>
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  /* opacity: 0.8; */
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
  height: 500px;
  width: 300px;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
@endsection
@section('content')
<section id="section-sidebar-left">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="form-row">
          <div class="form-group col-md-10 m-auto text-center">
            <img id="user_avatar_img" src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}"
            style="width:100px; height:100px; border-radius:50%;">
          </div>
          <form id="search-user" action="{{ URL('/search') }}" method="GET" role="search">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div class="form-group col-md-10 m-auto">
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
              <div class="input-group" tyle="width: 297px;margin-left: -78px;">
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
           
                {{-- <div class="row cal" style="margin-left:-40px">
                    <div class="col-md-8 ">
                        <div class="example1" style="margin:0 auto;margin-left: -25px !important;"></div>
                    </div>
                </div> --}}
      
        <br>
      <div class="col-md-12" style="border:1px solid gray;padding-bottom:5px;padding-top:20px;padding-left:0px;padding-right:0px;width:295px !important;margin-left:px !important;max-width:295px">

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
              </ul>
          </div>
          <div class="ul-schedule-list" style="padding-top: 20px;padding-bottom: 20px;">
              <ul class="ul-schedule-list">
                <li class="" >
                  <a href=""><i class="fas fa-certificate"></i> &nbsp; My Availability</a>
                </li>
              </ul>
          </div>
        {{-- <div class="div-layer-all">
          <h4 class="layer-all text-center">All ></h4>
          <div class="div-layer-my-list">
            <span class="layer-my-list">
              <h4 class="text-center mt-4">My List</h4>
              <h5 class="mt-4">Schedule</h5>
              <ul class="ul-schedule-list">
                <li class="li-schedule-list">
                  <a href="">Waiting for approval</a>
                </li>
                <li class="li-schedule-list">
                  <a href="">Asked my schedule</a>
                </li>
                <li class="li-schedule-list">
                  <a href="">Booked schedule</a>
                </li>
                <li class="li-schedule-list">
                  <a href="{{ route('events.create') }}">Add a schedule</a>
                </li>
                <li class="li-schedule-list">
                  <a href="">Ask a schedule</a>
                </li>
              </ul>
              <h5 class="mt-4">Events</h5>
              <ul class="ul-event-list">
                  <li class="li-event-list">
                    <a href="">Club events</a>
                  </li>
                  <li class="li-event-list">
                    <a href="">Joining events</a>
                  </li>
                  <li class="li-event-list">
                    <a href="">My open events</a>
                  </li>
                  <li class="li-event-list">
                    <a href="">Add New event</a>
                  </li>
              </ul>
            </span>
          </div>
        </div> --}}
      </div>
    </div>
    <div class="col-md-8">
      <div class="card text-center">
          <a href="{{ URL('/events') }}"><i class="fa fa-times-circle fl-r crs-pntr" style="font-size:27px;color:#6c757d;"></i></a>
        {{-- <div class="col-md-12">
          <div class="mt-2 mb-2">
            @if(empty($event->event_checked))
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="event_checked" name="event_checked" class="custom-control-input">
              <label class="custom-control-label" for="event_checked">Events</label>
            </div>
            @else
            <div class="custom-control custom-radio custom-control-inline">
              <input disabled checked type="radio" id="event_checked" name="event_checked" class="custom-control-input">
              <label class="custom-control-label" for="event_checked">Events</label>
            </div>
            @endif
            @if(empty($event->schedule_checked))
            <div class="custom-control custom-radio custom-control-inline">
              <input disabled type="radio" id="schedule_checked" name="schedule_checked" class="custom-control-input">
              <label class="custom-control-label" for="schedule_checked">Schedule</label>
            </div>
            @else
            <div class="custom-control custom-radio custom-control-inline">
              <input disabled checked type="radio" id="schedule_checked" name="schedule_checked" class="custom-control-input">
              <label class="custom-control-label" for="schedule_checked">Schedule</label>
            </div>
            @endif
          </div>
        </div> --}}
        <div class="img-upload " style="border-radius: 0px !important">
          <div class="card-img-top">
          <img src="{{ asset('uploads/event/' . $event->event_featured_image) }}" style="width: 100%;">
        </div>
        </div>
        <div class="card-body">
          {{-- <h5 class="card-title display-4">{{ $event->event_title }}</h5> --}}
          <div class="row event-content">
           <div class="col-md-2 pr-0 text-center">
             <div class="display-4 mb-1 text-danger">{{ date('M', strtotime($date_to_show->event_date)) }}</div>
             <div class="h1 mb-1">{{ date('j', strtotime($date_to_show->event_date)) }}</div>
             
           </div>
           <div class="col-md-2 ">
              <div class="h3 text-center mb-1 mt-1"><i class="fas fa-ticket-alt"></i> ${{ $date_to_show->event_ticket_price }}</div>
             {{-- <div class="h6 text-center mb-1 mt-1">$50 - $100</div> --}}
             {{-- <div class="h6 text-center mb-1 mt-1"><i class="fas fa-times fa-1x"></i> No refund</div> --}}
             {{-- <div class="btn btn-default btn-sm mb-1 mt-1" data-toggle="modal" data-target="#eventModal">
               <i class="fas fa-list-ul fa-1x"></i> Plan & Price
             </div> --}}
           </div>
            <div class="col-md-6" >
                <h2 class="" style="margin-top:-20px">{{ $event->event_title }}</h2>
                <div class="row mt-2">
                  
                  <div class="col-md-6">
                    <h6 class="text-muted" style="margin-top:-20px"> {{ $event->event_start_time }}</h6>
                  </div>
                  <div class="col-md-6">
                    <h6 class="text-muted" style="margin-top:-20px">{{ $event->event_end_time }}</h6>
                  </div>
                </div>
              <div class="row mt-2">
                {{-- <div class="col-md-6">
                  @if(empty($event->interested_in_event))
                    <h4 class="text-muted" id="interested_in_event">0 Ineterest</h4>
                  @else
                    <h4 class="text-muted" id="interested_in_event">{{ ($event->interested_in_event) }} Interested</h4>
                  @endif
                </div>
                <div class="col-md-6">
                  @if(empty($event->going_in_event))
                     <h4 class="text-muted" id="going_in_event">0 Going</h4>
                  @else
                    <h4 class="text-muted" id="going_in_event">{{ ($event->going_in_event) }} Going / 30</h4>
                  @endif
                </div> --}}
              </div>
              <div class="row mt-2">
                <div class="col-md-3">
                  <h6 class="text-muted">City: {{ $event->event_city }}</h6>
                </div>
                <div class="col-md-4">
                  <h6 class="text-muted">Country: {{ $event->event_country }}</h6>
                </div>
                <div class="col-md-5">
                  <h6 class="text-muted">Phone: {{ $event->event_phone }}</h6>
                </div>
                {{-- <div class="col-md-12 text-left mt-2">
                  <h6 class="text-muted">Address: {{ $event->event_address }}</h6>
                </div> --}}
              </div>
            </div>
            <div class="col-md-2">
              @if(empty($event->event_is_online))
              <div class="custom-control custom-checkbox float-right">
               <input type="checkbox" class="custom-control-input" id="event_is_online" name="event_is_online">
               <label class="custom-control-label" for="event_is_online">Online</label>
              </div>
              @else
              <div class="custom-control custom-checkbox float-right">
               <input disabled checked type="checkbox" class="custom-control-input" id="event_is_online" name="event_is_online">
               <label class="custom-control-label" for="event_is_online">Online</label>
              </div>
              @endif
              @if(empty($event->going_in_event))
              <div class="custom-control custom-checkbox float-right mt-2">
                <input type="checkbox" class="custom-control-input" id="going_in_event" name="going_in_event">
                <label class="custom-control-label" for="going_in_event">Going</label>
              </div>
              @else
              <div class="custom-control custom-checkbox float-right mt-2">
                <input disabled checked type="checkbox" class="custom-control-input" id="going_in_event" name="going_in_event">
                <label class="custom-control-label" for="going_in_event">Going</label>
              </div>
              @endif
              {{-- @if(empty($event->no_need_approval))
              <div class="custom-control custom-checkbox float-right mt-2">
                <input type="checkbox" class="custom-control-input" id="no_need_approval" name="no_need_approval">
                <label class="custom-control-label" for="no_need_approval">Approved</label>
              </div>
              @else
              <div class="custom-control custom-checkbox float-right mt-2">
                <input disabled checked type="checkbox" class="custom-control-input" id="no_need_approval" name="no_need_approval">
                <label class="custom-control-label" for="no_need_approval">Approved</label>
              </div>
              @endif --}}
              {{-- @if(empty($event->need_approval))
              <div class="custom-control custom-checkbox float-right mt-2">
                <input type="checkbox" class="custom-control-input" id="need_approval" name="need_approval">
                <label class="custom-control-label" for="need_approval">Approval needed</label>
              </div>
              @else
              <div class="custom-control custom-checkbox float-right mt-2">
                <input disabled checked type="checkbox" class="custom-control-input" id="need_approval" name="need_approval">
                <label class="custom-control-label" for="need_approval">Approval needed</label>
              </div>
              @endif --}}
            </div>
          </div>
          <div><hr id="event-border"></div>
          <div class="row text-left mb-3">
            <div class="col-md-10">
              <button class="btn btn-default">
                <a href="#"><i class="fas fa-share-square fa-1x"></i></a>
              </button>
              <button class="btn btn-default">
                <a href="#"><i class="far fa-star fa-1x"></i></a>
              </button>
              {{-- <a class="btn btn-default" name="event_not_going" style="float:right;margin-right: -124px;" href="/not-going-to-event/{{Auth::user()->id}}/{{$event->user_id}}/{{$event->id}}">
                <i class="far fa-times-circle fa-1x"></i> Not going
              </a> --}}
              	<?php $flag=false ?>
                    @foreach ($eventVisitors as $eventVisitor)
              

                      @if($eventVisitor->user_id == Auth::user()->id)

                      <?php $flag=true; ?>
                        <a class="btn btn-default" type="button"  name="event_not_going" style="float:right;margin-right: -124px;"
                        href="/not-going-to-event/{{Auth::user()->id}}/{{$event->user_id}}/{{$event->id}}"> <i class="fa fa-times fa-1x"></i> going 
                        </a>
                      

                      @endif

                    @endforeach

                    <?php if($flag == false){ ?>
                    
                      <a class="btn btn-default" type="button"  name="event_not_going" style="float:right;margin-right: -124px;"
                    href="/going-to-event/{{Auth::user()->id}}/{{$event->user_id}}/{{$event->id}}/{{$date_to_show->id}}"> <i class="fa fa-check fa-1x"></i> going 
                        </a> 
                      
                    <?php } ?>
              
            </div>
         </div>
         <div class="col-md-12">
           <div class="card">
             <div class="card-header" style="background-color:darkslategray">
                <div class="row">
                    <div class="col-md-12 ">
                        <h6 class="text-muted">Address: {{ $event->event_address }}</h6>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                    <div class="btn btn-default btn-sm "  style="background-color:white;border:1px solid">
                        <a href="/event/plan&price/{{$event->id}}"><i class="fas fa-list-ul fa-1x"></i> Plan & Price </a>
                    </div>
                    <div class="custom-control custom-checkbox  mt-2">
                        <input type="checkbox" class="custom-control-input" id="no_need_approval" name="no_need_approval">
                        <label class="custom-control-label" for="no_need_approval">No Refund</label>
                      </div>
                    <div class="custom-control custom-checkbox  mt-2">
                        <input type="checkbox" class="custom-control-input" id="need_approval" name="need_approval">
                        <label class="custom-control-label" for="need_approval">Approval needed</label>
                      </div>
                     
                </div> 
                
                   
                     <div class="col-md-2 mt-1 pt-1">
                       <img id="user_avatar_img" src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}"
                       style="width:50px; height:50px; border-radius:10%;">
                       <p>{{ $event->user->name }} by {{ substr(strip_tags($event->created_at), 0, 10) }}</p>
                     </div>
                     <div class="col-md-2 mt-1 pt-1">
                       <img id="user_avatar_img" src="{{ asset('/uploads/avatars/' . Auth::user()->avatar) }}"
                       style="width:50px; height:50px; border-radius:10%;">
                       <p>{{ $event->user->name }} by {{ substr(strip_tags($event->updated_at), 0, 10) }}</p>
                     </div>
              

                 <div class="col-md-5">
                          
                    <div class="form-group" style="float:right">
                            <select class="btn btn-outline-secondary" id="event_type" aria-label="event_type" name="event_type">
                              <option selected>Event Type</option>
                              <option value="private_event">Private Event</option>
                              <option value="public_event">Public Event</option>
                              <option value="club_event">Club Event</option>
                              <option value="club_orivate_event">Club Private Event</option>

                            </select>
                    </div>
                            <div class="form-group">
                              <form method="POST" action="/event/invite/{{ $event->id }}">
                                @csrf
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
                                    <button type="submit"   name="button" class="btn btn-outline-secondary">Invite</button>
                                  </div>
                                </div>
                              </form>
                              </div>
                       
                    </div>

                </div>

                
             </div>
        <br>
                 
               
                 <div class="form-group">
                   <textarea disabled class="form-control" id="event_description" name="event_description" rows="5" placeholder="{{ $event->event_description }}"></textarea>
                 </div>
           
                 <div class="form-group but" style="float:right !important">

                    {{-- <a href="{{ route('events.edit', $event->id) }}" class="btn btn-outline-secondary ">Edit</a>
                    <a href="{{ route('events.index') }}" class="btn btn-outline-secondary ">Cancel</a> --}}
                    <a href="{{ route('events.edit', $event->id) }}"  class="btn btn-outline-secondary"  ><i class="fa fa-edit"></i>&nbspEdit</a>

                 <a href="{{route('events.index')}}" class="btn btn-outline-secondary " ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp Cancel </a>&nbsp
                </div>
               </form>
             </div>
           </div>
         </div>
        </div>
        <div class="card-footer text-muted">
          Last Update on: {{ substr(strip_tags($event->updated_at), 0, 10) }}
        </div>
      </div>
    </div>
  </div>
</div>
</section>
{{-- @include('partials.event_modal') --}}
@endsection

@section('extra-JS')
<script src="{{ asset('js/jquery.supercal.js')}}"></script> 
<script>

$(function () {
        
  $('#datetimepicker5').datetimepicker({
      format: 'L',
      minDate: new Date()
    });
  });
  $('.example1').supercal({
		transition: 'carousel-vertical'
});

function openForm() {

  document.getElementById("myForm").style.display = "block";

}

function closeForm() {

  document.getElementById("myForm").style.display = "none";

}


</script>
@endsection
