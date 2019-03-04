@extends('layouts.app')
@section('custom-styles')
<link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.css') }}">
{{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<section id="section-sidebar-left">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
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
              <div class="input-group" style="width: 297px;margin-left: -56px;">
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
           
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="example1" style="margin:0 auto;margin-left: -25px !important;"></div>
                    </div>
                </div>
      
        <br>
        <div class="col-md-12" style="border:1px solid gray;padding-bottom:5px;padding-top:20px;padding-left:0px;padding-right:0px;width:295px !important;margin-left:-20px;max-width:295px">
         
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
        <div class="row">
          
          @foreach ($draftEevents as $event)
          <div class="col-sm-4">
            <div class="card">
              <div class="card-img-top">
                <a href="/draft/add-plan/{{$event->id}}">
                  <img src="{{ asset('uploads/event/' . $event->event_featured_image) }}" style="width: 100%;">
                </a>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12 p-0 pl-2">

                      
                     <h3>{{ $event->event_title }}</h3>

                    </div>
                </div>  
                <hr id="event_view_border">
                <div class="row" style="margin-top:10px">
                  <div class="col-md-12">
                    <div class="text-muted">
                        City : {{ $event->event_city}}
                      
                      </div>
                  </div>
                </div>
                <div class="row" style="margin-top:10px">

                  <div class="col-md-12">
                      <div class="text-muted">
                      
                         Country :  {{ $event->event_country }}
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px">

                    <div class="col-md-12">
                        <div class="text-muted">
                           
                          Phone :  {{ $event->event_phone  }}
                          </div>
                      </div>
                </div>
                <hr id="event_view_border">

                
              </div>
             
            </div>
          </div>
          @endforeach
      </div>
    </div>
  </div>
  <div class="text-center">
    {{-- {!! $events->links(); !!} --}}
  </div>
</div>
</section>
@endsection

@section('extra-JS')
<script src="{{ asset('js/jquery.supercal.js')}}"></script> 
<script type="text/javascript">
	$('.example1').supercal({
				transition: 'carousel-vertical'
			});
    $(function () {
        $('#datetimepicker13').datetimepicker({
           
        });
    });
</script>
@endsection
