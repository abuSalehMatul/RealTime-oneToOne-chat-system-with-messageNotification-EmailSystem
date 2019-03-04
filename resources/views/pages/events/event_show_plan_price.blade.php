@extends('layouts.app')
@section('custom-styles')
{{-- <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.css') }}"> --}}

<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
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
    position: absolute;
    bottom: 0;
    left: 790px;
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
    
      <div class="col-md-12">
            {!! Form::open(array('id'=>'eventM_form' , 'route' => 'eventM.store', 'files' => true)) !!}
            @csrf
      <input name="event" value="{{$event->id}}" hidden>
          <div class="container addEvent" style="border:2px solid gray;padding-bottom:5px">
            <div class="col-md-12">
              <div class="mt-3">
                  <a href="{{ URL('/events') }}"><i class="fa fa-times-circle fl-r crs-pntr" style="font-size:27px;color:#6c757d;"></i></a>
                  <div class="img-upload " style="border-radius: 0px !important;text-align:center;padding-left:0px" >
                    @if($event->event_modal_image)

                        <img width="1100" height="300" id="modal_image_preview" src="{{ asset('uploads/event/' . $event->event_modal_image) }}" alt="Image"  class="img-responsive"/>

                    @else

                        <img width="1000" height="300" id="modal_image_preview" src="/uploads/avatars/picture-01-512.png" alt="Image"  class="img-responsive"/>

                    @endif
                        <span class="hide">
                        {{-- {!! Form::file('event_modal_image', ['id'=>'event_modal']) !!} --}}
                        <input class="form-control" type="file" id="event_modal" name="event_modal_image" >
  
                        </span>
                    </div>
                
                 <div><hr id="event-border"></div>
                 
               
             </div>
             <div class="row mb-3">
               <div class="col-md-10">
               
               </div>
            </div>
            </div>
            <div class="col-md-12">
              
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

                 
          {!! Form::close() !!}
                
              </div>
              <div><hr id="event-border"></div>

                    <div class="col-md-12">
                           @foreach ($eventPlans as $eventM)
           
                           <div class="row mt-2">
                             <div class="col-sm-1 ">
                                 <div class="form-group">
                                     {{-- <div class="input-group date"> --}}
                                       {{-- <div class="input-group-append">
                                           <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                       </div> --}}
                                       <?php if(!empty($eventM)){ ?>
                                         <label   id="event_date" class="" style="border:none !imprtant"
                                          name="event_date">{{ substr(strip_tags($eventM->event_date), 0, 11) }}
                                         {{ strlen(strip_tags($eventM->event_date)) > 11 ? " " : ""}}</label>
                                       <?php }else{
               
                                            //    echo "hi";
               
                                       } ?>
                                     {{-- </div> --}}
                                 </div>
                             </div>
                             <div class="col-sm-2 ">
                                 <div class="form-group">
                                     <div class="input-group date">
                                       {{-- <div class="input-group-append">
                                           <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                                       </div> --}}
                                       <?php if(!empty($eventM)){  ?>
                                       <label class="" placeholder="" name="event_start_time"> {{ $eventM->event_start_time }} - {{ $eventM->event_end_time }}</label>
                                       <?php }else{ 
                                        //    echo "hi"; 
                                           } ?>
                                       {{-- <label disabled type="text" class="col-sm-6 form-control form-control-sm" placeholder="" name="event_end_time"></label> --}}
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-1 m-0 p-0 ml-1">
                                 <div class="form-group">
                                     <div class="input-group date">
                                         <label  class="" name="event_ticket_price"  placeholder="" id="event_ticket_price"><i class="fas fa-ticket-alt"></i>{{ $eventM->event_ticket_price }}</label>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-3 m-0 p-0 ml-1">
                                     <div class="form-group">
                                         <div class="input-group date">
                                             <label  class="" name="event_ticket_price"  placeholder="" id="event_ticket_price">{{ $eventM->event_details }}</label>
                                         </div>
                                     </div>
                                 </div>
                             <div class="col-sm-1 m-0 p-0 ml-1 mr-2 mt-1">
                                 <?php $waiting = 0; $approved = 0; ?>
                                @foreach($eventVisitors as $ev)

                                    <?php if( $ev->event_modal_id == $eventM->id && $ev->going_status == "pending" ){
                                        $waiting++;
                                    }
                                    elseif($ev->event_modal_id == $eventM->id && $ev->going_status == "approved"){
                                        $approved++;
                                    }
                                    ?>
                                @endforeach
                                 <div class="form-group">
                                     <div class="input-group date">
                                       <div class="custom-control custom-checkbox">
                                         <input type="checkbox" class="custom-control-input" id="event_going">
                                       <label class="" for="event_going">{{$approved}} Going <small class="text-danger">({{$waiting}} waiting)</small></label>
                                       </div>
                                     </div>
                                 </div>
                                 
                             </div>
                             <div class="col-sm-3 ">
                                 <div class="">
                                 @foreach($eventVisitors as $ev)

                                 <?php $flag = false; if($ev->user_id == Auth::user()->id && $ev->event_modal_id == $eventM->id ){

                                  $flag=true; ?>
                                   <a class="btn btn-default" type="button"  name="event_not_going" style=""
                                   href="/not-going-to-event/{{Auth::user()->id}}/{{$event->user_id}}/{{$event->id}}/{{$eventM->id}}"> <i class="fa fa-times fa-1x"></i> going 
                                   </a>
                                  
                                <?php break ; } ?>
                                    
                                @endforeach
                                <?php if($flag == false){ ?>
                    
                                    <a class="btn btn-default" type="button"  name="event_not_going" style=""
                                  href="/going-to-event/{{Auth::user()->id}}/{{$event->user_id}}/{{$event->id}}/{{$eventM->id}}"> <i class="fa fa-check fa-1x"></i> going 
                                      </a> 
                                    
                                  <?php } ?>

                                   <a   class="btn btn-default " type="button" style="margin-right:-35px;float:right" onclick="openForm()">
                                     <i class="fas fa-list-ul"></i> Approve List <span class="badge badge-secondary">{{$waiting + $approved}}</span> &nbsp;  <i class="fas fa-times"></i>
                                   </a>
                                   
                                   
                                 </div>
                             </div>
                 
                            
                           </div>
                          
                           @endforeach
                           <div class="chat-popup" id="myForm" style="background:white;margin-bottom: 10px;">
                
                                <a onclick="closeForm()"> <i class="fas fa-times" style="float:right"></i></a>
                               {{-- <h1>Chat</h1> --}}
                           
                               @foreach ($eventVisitors as $eventVisitor)
                               
                                 
             
                                 <div class="row" style="margin-top:30px">
             
                                     @foreach ($users as $user)
             
                                       @if($eventVisitor->user_id == $user->id && $eventVisitor->event_modal_id == $eventM->id )
             
                                         <div class="col-md-2 ">
                                             <img id="user_avatar_img" src="{{ asset('/uploads/avatars/' . $user->avatar) }}"
                                             style="width:50px; height:50px; border-radius:50%;margin-left:2px"> 
             
                                         </div>
                                         <div class="col-md-3" style="margin-top:10px;margin-left:15px">
                                             {{$user->name}}
                                         </div>
           
                                         @if($eventVisitor->going_status == 'approved')
           
                                            <div class="col-md-2" style="margin-top:10px;float:right;margin-left:85px">
                                           
                                               {{-- <a href="/going-status/approved/{{$user->id}}/{{$eventVisitor->event_id}}/{{ $eventM->event_ticket_price }}" > <i class="fa fa-check-circle " aria-hidden="true"></i> </a> --}}
                                            </div>
           
                                           @else
                                           <?php if(!empty($eventM)){ ?>
                                               <div class="col-md-2" style="margin-top:10px;float:right;margin-left:85px">
                                           <?php if($event->need_approval == 'on'){ ?>
                                                   <a href="/going-status/approved/{{$user->id}}/{{$eventVisitor->event_id}}/{{ $eventM->event_ticket_price }}"> <i class="fa fa-check-circle " aria-hidden="true"></i> </a>
                                               </div>
                                           <?php } ?>
                                           <?php }else{  } ?>
                                          @endif
                                          <?php if(!empty($eventM)){ ?>
                                           <div class="col-md-2" style="margin-top:10px;float:right;margin-left:-32px">
                                             
                                               <a href="/going-status/rejected/{{$user->id}}/{{$eventVisitor->event_id}}/{{ $eventM->event_ticket_price }}">    <i class="fa fa-times-circle" aria-hidden="true"></i> </a>
             
                                           </div>
                                       <?php }else {  } ?>
             
                                         @endif  
             
                                      @endforeach
                                    
             
                                 </div>
                                     
                                 
             
                               @endforeach
                           
                               
                               {{-- <button type="button" class="btn cancel" onclick="closeForm()">Close</button> --}}
                             
                           </div>
                    </div>
                  
                
            </div>
          </div>
          
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
    // /alert();
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

</script>
@endsection
