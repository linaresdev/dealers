@extends( "delta::app.warranties.layout" )

	@section("body")

	<header class="py-3">

		<article class="row">
			<div class="col-auto">
				<img src="{{__url($org->getMeta("logo"))}}" 
					class="avatar avatar-circle avatar-80px" 
					alt="@">
			</div>
			<div class="col-auto pt-3">
				<h4 class="m-0">{{$org->group}}</h4>
				<small>{{$org->getMeta("email")}}</small>
			</div>
		</article>
		
	</header>
	

	<article id="ajax-content"></article>

	@endsection

	@section("js")
		@parent<script>

			if( jQuery(window).width() > 575 ) {
				jQuery.get("{{__url('__now/ajax/home/md')}}", function(data) {
					jQuery("#ajax-content").html(data);
				});
			}
			else {
				jQuery.get("{{__url('__now/ajax/home/sm')}}", function(data) {
					jQuery("#ajax-content").html(data);
				});
			}
			
		</script>
	@endsection