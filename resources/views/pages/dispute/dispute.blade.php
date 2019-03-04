@extends('layouts.app')

@section('content')
    
    <section class="membership-sec">
        <input type="hidden" value="{{$dispute_maker_email}}" id="log_email">
        <input type="hidden" value="{{$user_id}}" id="user_id">
		<div class="container">
			<div class="top-head-sec">
				<div class="member-top-bar">
					<div class="row">
						<div class="col-sm-6">
							<h3 class="main-head-top">Dispute</h3>
						</div>
						<div class="col-sm-6">
							<a href="#"><i class="fa fa-close"></i></a>
						</div>
					</div>
				</div>
				<div class="reg-sec">
					<div class="row">
						
					</div>
				</div>
				<div class="reg-sec">
					<div class="row">
						<div class="col-md-6">
						
						</div>
						<div class="col-md-6">
						
						</div>	
					</div>
					<div class="update-and-verify">
						<div class="row">

						</div>
					</div>
				</div>	
				<div class="">
					<div class="col-md-12" style="
    height: 900px;
">
						<div class="radio-div">
						<div class="m-t-12"></div>
						<label class="radio-inline"><input type="radio" name="optradio" checked>My Record</label>
						<label class="radio-inline"><input type="radio" name="optradio">Others Open Record</label>
						<label class="radio-inline"><input type="radio" name="optradio">All Closed Record</label>
						<label class="radio-inline"><input type="radio" name="optradio">Dispute Manager Record</label>
						<div class="m-b-12"></div>
					</div>
						<div class="table-div">
						
							<table class="table">
								<thead>
								  <tr class="head">
										<th>Dispute No</th>
										<th>Datetime</th>
										<th>Dispute Note</th>
										<th>Dispute Maker</th>
										<th>Status</th>
										<th>Open With</th>
										<th>Conversation Record</th>
								  </tr>
								</thead>
								<tbody>
                                <?php 
                                   
                                    $i = 0;
                                    foreach($disputes as $key=>$value): 
                                ?>
								  <tr id="<?php echo $i; ?>" style="cursor:pointer;" class="get-dispute" data-open-with-pic<?php echo $i; ?>="<?php echo $value['avatr2']; ?>" data-maker-pic<?php echo $i; ?> ="<?php echo $value['avatr1']; ?>">
										<td id="dispute_no<?php echo $i; ?>"><?php echo $value['d_dispute_no']; ?></td>
										<td id="created_at<?php echo $i; ?>"><?php echo $value['d_created_at']; ?></td>
										<td id="notes<?php echo $i; ?>"><?php echo $value['r_notes']; ?></td>
										<td  id="dispute_maker<?php echo $i; ?>"><?php echo $value['d_dispute_maker']; ?></td>
										<td id="status<?php echo $i; ?>"><?php echo $value['d_status']; ?></td>
										<td  id="open_with<?php echo $i; ?>"><?php echo $value['d_open_with']; ?></td>
										<td id="dispute_no<?php echo $i; ?>"><?php echo $value['d_dispute_no']; ?></td>
								  </tr>
                                <?php 
                                    $i++;
                                    endforeach;  
                                ?>
								</tbody>
							  </table>
						</div>
						<div class="col-xs-12">
							<span data-dispute-no="<?php echo rand(); ?>" data-dispute-maker="{{$dispute_maker_email}}" class="f-l-r m-r-90" id="add_new" style="cursor:pointer;">+ Add a new dispute</span>
                        </div>
                        <div class="clearfix"></div>
                        <form id="dispute_details" method="POST">
                        <div class="row">
                            <div class="col-xs-3 m-t-40 m-l-81 pa-t-40">	
                                <div class="input-group">
                                    <input name="dispute_unique_no" id="dispute_unique_no" type="text" class="form-control" placeholder="Dispute No">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="m-t-12">
								    <span class="f-s-18"><?php echo  date("F j, Y, H:i:s"); ?></span>
							    </div>
                            </div>	
                            <div class="col-xs-3 m-t-40">
                                <div class="img-left-cont">
                                    <img id="dispute_maker_img" class="h-82-p b-r-38" src="{{ asset('/uploads/avatars/' . $user->avatar) }}" alt="Profile picture"/>
                                </div>
                                <div class="">
                                    <div class="input-group">
                                        <input name="dispute_maker_email" id="dispute_maker_email" type="text" class="form-control" placeholder="dispute maker">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
							    </div>
                            </div> 
                            <div class="col-xs-3 m-t-40">
                                <div class="m-t-81">
                                </div>
                                <div class="">
                                    <select name="dispute_opts" class="form-control" id="dispute_opts">
                                        <option>Select any option</option>
                                    </select>
							    </div>
                            </div>	
                            <div class="col-xs-3 m-t-40">
                                <div class="img-left-cont f-r">
                                    <img id="open_with_img" class="h-82-p b-r-38" src="" alt="No Picture"/>
                                </div>
                                <div class="">
                                    <div class="input-group">
                                        <input id="dispute_onpen_with" name="dispute_onpen_with" type="email" class="form-control" placeholder="open with">
                                        <input id="replyer_id" name="replyer_id" type="hidden" value="">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default search_user" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
							    </div>
                            </div> 	
                        </div>	
						<div class="row">
                            <div class="col-xs-2 m-t-12 m-div">
                                <span>-</span>
                            </div>
                            <div class="col-xs-10 m-t-12 text-center sub-div">
                                <span class="f-c-r">Dispute Subject (One time Entry)</span>
                            </div>
                        </div>
						<div class="col-xs-10 m-l-86">
								<div class="form-group">
								    <div class="form-control"  id="comment" style="
    height: 131px;overflow:scroll
">
                                        <?php foreach($replies as $key => $value): ?>
                                            <span><?php 
                                                    $email = App\User::where('id',$value['note_id'])->get()->toArray();
                                                    echo $email[0]['email'];
                                                ?>
                                            </span>
                                            <span><?php echo date("F j, Y, H:i:s",strtotime($value['created_at'])); ?></span>
                                            <p>{{$value['notes']}}</p>
                                        <?php endforeach; ?>
                                    </div>
							    </div>
						</div>
						<div class="col-xs-10 m-l-86 m-t-12">
								<div class="form-group">
										<textarea name="notes" class="form-control" rows="5" id="comment"></textarea>
									  </div>
                        </div>
                        <div class="m-b-12">
                        </div>
						<div class="col-xs-12 m-t-12">
							<button id="submit_dispute" type="button" class="btn btn-success f-l-r">Submit</button>
                        </div>
                        </form>
					</div>
				</div>
			</div>
        </div>
   
	</section>
	
@endsection

@section('extra-JS')
    <script src="https://cdn.jsdelivr.net/npm/js-sql-parser@1.0.7/dist/parser/sqlParser.js"></script>
    <script src="{{ asset('js/FileSaver.js') }}"></script>
    <script src="{{ asset('js/Blob.js') }}"></script>
    <script src="{{ asset('js/xlsx.core.min.js') }}"></script>
    <script src="{{ asset('js/tableexport.js') }}"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $("#add_new").click(function(){
               $("#dispute_maker_email").val($(this).attr("data-dispute-maker"));
               $("#dispute_unique_no").val($(this).attr("data-dispute-no"));
                $html =    '<option value="action_request">Action Request</option>'
                                        + '<option value="to_dispute_manager">To Dispute Manager</option>'
                                        + '<option value="under_review">Under Review</option>'
                                        + '<option value="closed">Closed</option>';
                $("#dispute_opts").html($html);
            });
            $("#submit_dispute").click(function(){
                $.ajax({
                    url: "add_dispute",
                    type: "POST",
                    data: {dispute : $("#dispute_details").serializeArray()},
                    dataType: "JSON",
                    success: function (data) 
                    {
                        $res1 = data['res1'];	
                        $res2 = data['res2'];
                        console.log( $res2 );
                        if (typeof value === "undefined") 
                        {
                            $html   = $("#log_email").val()+"   "+data['date_to_show']+"\n\n";
                        }
                        else
                        {
                            $html   = $res1.dispute_maker+"   "+data['date_to_show']+"\n\n";
                        }
                        $html1  = $res2.notes;
                        $("#comment").append($html);
                        $("#comment").append($html1);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                       
                    }
                });
            });
        });
    </script>
    <script>
            $('.search_user').on('click', function(e)
            {
                e.preventDefault();
                $.ajax({
                    url: "/findmenu_options",
                    type: "GET",
                    data:{
                    email: $("#dispute_onpen_with").val(),
                    },
                    success: function (msg) {
                        if(msg != 1){
                            var obj = jQuery.parseJSON( msg );
                            $("#open_with_img").attr('src', '/uploads/avatars/'+obj[0].avatar);
                            $("#replyer_id").val(obj[0].id);
                        }
                    },
                    error: function (data) {
                    }
                });
            });
            $(".get-dispute").click(function(){
                var  id = $(this).attr("id");
                var log_email = $("#log_email").val();
                var dispute_no = $("#dispute_no"+id).text();
                $("#dispute_unique_no").val(dispute_no);
                var dispute_maker = $("#dispute_maker"+id).text();
                $("#dispute_maker_email").val(dispute_maker);
                var open_with = $("#open_with"+id).text();
                $("#dispute_onpen_with").val(open_with);
                var user_id = $("#user_id").val();
                $("#replyer_id").val(user_id);
                if(log_email != dispute_maker)
                {
                    var html = "<option value=''>Select any option</option><option value='action_request'>Action Request</option><option value='to_dispute_manager'>To Dispute Manager</option><option value='under_review'>Under Review</option><option value='close_request'>Close Request</option>";
                    $("#dispute_opts").html(html);
                }
                else
                {
                    
                }
                $("#dispute_maker_img").attr('src', '/uploads/avatars/'+$(this).attr("data-maker-pic"+id));
                $("#open_with_img").attr('src', '/uploads/avatars/'+$(this).attr("data-open-with-pic"+id));
            });
    </script>

@endsection