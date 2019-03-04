@extends('layouts.app')
@section('custom-styles')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           	<div class="card">
	            <div class="card-header cop-h-f-weight">
	              	FAQ Setup
	              	<a href="{!! route('home') !!}">	<i class="fa fa-times-circle fl-r crs-pntr cop-cross-sign"></i></a>
	            </div>
            <div class="card-body">
          	  <div class="row mar-b-10">
                <div class="col-md-12">
	              <table class="table">
	                <thead>
	                  <tr>
	                    <th>Question</th>
	                    <th>Answer Text</th>
	                    <th>Image</th>
	                    <th>Youtube link</th>
	                  </tr>
	                </thead>
	                <tbody>
	                	 @foreach ($faqs as $key => $item)
	                            <tr>
	                                <td><a href="{!! route("faq.edit", $item->id) !!}">{!! $item->question!!}</a></td>
	                                <td>{!! $item->answer !!}</td>
	                                <td>{!! $item->image !!}</td>
	                                <td class="ic">{!! $item->youtube_link !!}
	                               <a onclick="return confirm('Are you sure you want to delete?');" href="{!! route('faq.delete', @$item->id) !!}"><i  class="fa fa-times-circle icona fl-r crs-pntr cop-cross-sign"></i></a>
	                                	
	                                </td>
	                            </tr>
	                        @endforeach
	                </tbody>
	              </table>
          	    </div>
          	    <div class="col-md-12">
          	    	{!! $faqs->render() !!}	
          	    </div> 
          	  </div>
          	  <hr/>
          	  <div class="row mar-b-10">
                <div class="col-md-12">
                	{!! Form::open(['url' => $formUrl, 'method' => 'post', 'class' => 'form-horizontal', 'files' => true]) !!}

                	<div class="form-group">
                        <label for="question">Question</label>
                        {!! Form::text('question', @$faq->question, ['class' => 'form-control', 'required']) !!}
		            </div>
		            <div class="form-group">
                        <label for="answer">Answer</label>
                        {!! Form::textarea('answer', @$faq->answer, ['class' => 'form-control', 'rows' => '3', 'required']) !!}
		            </div>
		            <div class="row mar-b-10">
		            	<div class="col-md-6">
		            		<img width="500" height="300" id="ImagePreview" src="{!! $faqImg !!}" alt="Image"  class="img-responsive"/>
							<span class="hide">
							{!! Form::file('image', ['id'=>'faqImage']) !!}
							</span>
		            	</div>
		            	<div class="col-md-6">
		            		{!! Form::text('youtube_link', @$faq->youtube_link, ['class' => 'form-control','id'=> 'you_link','placeholder'=>'Enter youtube link']) !!}
		            		<iframe id="iframe_link" width="520" height="255" frameborder="0" style="margin-top: 5px"  allowfullscreen></iframe>
		            	</div>
		            </div>
		            
		            @if (!empty(@$faq))
		            <a class="btn btn-md btn-primary mar-l-15 pull-right" href="{!! route('faqs') !!}">
		            	Cancel
		        	</a>
		            <a class="btn btn-md btn-danger mar-l-15 pull-right" onclick="return confirm('Are you sure you want to delete?');" href="{!! route('faq.delete', @$faq->id) !!}">
		            	Delete
		        	</a>
		        	@endif
		            <button type="submit" class="btn btn-md btn-success pull-right">
	              			{!! empty($faq) ? 'Save' : 'Update' !!}
	              	</button>
                	{!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('extra-JS')
<script type="text/javascript">
	$(document).ready(function(){
		function readURL(input) {
			  if (input.files && input.files[0]) {
			    var reader = new FileReader();
			    reader.onload = function(e) {
			      $('#ImagePreview').attr('src', e.target.result);
			    }
			    reader.readAsDataURL(input.files[0]);
			  }
		}
		$("#faqImage").css('display','none'); 
		var url = $("#you_link").val();
        url = url.split('v=')[1];
        $("#iframe_link")[0].src = "https://www.youtube.com/embed/" + url;
        $("#iframe_link").show();

		$('#ImagePreview').click(function(){ 
			$('#faqImage').trigger('click'); 
		});
		$('#faqImage').on('change', function () {
	    	if (this.files && this.files[0]) {
			    var reader = new FileReader();
			    reader.onload = function(e) {
			      $('#ImagePreview').attr('src', e.target.result);
			    }
			    reader.readAsDataURL(this.files[0]);
			}	
	    });
		$("#you_link").blur(function(){
  			var url = $("#you_link").val();
        	url = url.split('v=')[1];
        	$("#iframe_link")[0].src = "https://www.youtube.com/embed/" + url;
        	$("#iframe_link").show();
		});  
	}); 
</script>
@endsection