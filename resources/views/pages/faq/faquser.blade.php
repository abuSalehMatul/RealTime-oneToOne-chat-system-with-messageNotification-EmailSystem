@extends('layouts.app')
@section('custom-styles')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           	<div class="card">
	            <div class="card-header cop-h-f-weight">
	              	FAQ
	              	<a href="{!! route('home') !!}">	<i class="fa fa-times-circle fl-r crs-pntr cop-cross-sign"></i></a>
	            </div>
            <div class="card-body">
          	  <div class="row mar-b-10">
                <div class="col-md-12">
	              	<div class="accordion" id="accordionExample">
					   @foreach ($faqs as $key => $item)
					  <div class="card bor-b-1" >
					    <div class="card-header col-card" id="headingOne">
					        <button name="ii{{$key}}" id="ds" class="btn btn-default col-btn" type="button" data-toggle="collapse" data-target="#collapseOne{{$key}}" aria-expanded="true" aria-controls="collapseOne"><i class="iicon fa fa-plus"></i>
					        </button>
					     <span class="pad-l-10"> {!! $item->question !!}</span>
					    </div>
					    <div id="collapseOne{{$key}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					      <div class="card-body">
					        <div class="row col-md-12">
					        	{!! $item->answer !!}
					        </div>
					         <div class="row mar-t-15">
				            	<div class="col-md-6">
				            		<img width="500" height="300" id="ImagePreview" src="{{asset('uploads/faq/'.$item->image)}}" alt="Image" class="img-responsive"/>
				            	</div>
				            	<div class="col-md-6">
				            		<iframe src="{{ $item->youlink }}" id="iframe_link{{$key}}" width="500" height="300" frameborder="0"   allowfullscreen></iframe>
				            	</div>
		            		</div>
					      </div>
					    </div>
					  </div>
					    @endforeach
					</div>
          	    </div>
          	  </div>
          	    {!! $faqs->render() !!}	
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('extra-JS')
<script type="text/javascript">
	$(document).ready(function(){
		$('.collapse').collapse();
        
      		var selectIds = $('#collapseOne0,#collapseOne1,#collapseOne2,#collapseOne3,#collapseOne4,#collapseOne5,#collapseOne6,#collapseOne7,#collapseOne8,#collapseOne9,#collapseOne10,#collapseOne11,#collapseOne12,#collapseOne13,#collapseOne14,#collapseOne15,#collapseOne16,#collapseOne17,#collapseOne18,#collapseOne19,#collapseOne20');
			$(function ($) {
			    selectIds.on('show.bs.collapse hide.bs.collapse', function () {
			        $(this).prev().find('.fa').toggleClass('fa-plus fa-minus');
			    })
			});
	}); 
</script>
@endsection