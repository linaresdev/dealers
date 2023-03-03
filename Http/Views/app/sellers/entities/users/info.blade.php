@extends( "delta::app.dealers.entities.layout" )
	
	@section("content")

	<article class="box-group">
		<header class="box box-start">
			<article class="box-body pt-4">
				<div class="block">
					

					<h4>
						<img src="{{__url($user->avatar)}}"
						class="avatar avatar-circle" 
						style="width: 64px;" 
						alt="@">
						{{$user->fullname}} <br>

						<small>
							{!! __mdi("email-outline") !!}  
							{{$user->email}}
						</small>
					</h4>
				</div>

			</article>
		</header>

		<section class="box">
			<header class="box-header">
				<h4>
					{!! __mdi("domain") !!}
					{{__("entity.work")}}
				</h4>
			</header>

			<article class="box-body">
				<section class="block">
					@foreach($user->getDealers() as $info )
					<article class="ps-3 pb-3">
						<h4 class="fs-6">{{$info->group}}</h4>
						<p class="m-0 ps-2">
							{!! __mdi("email-outline") !!} 
							{{$info->getMeta("email")}}
						</p>
						<p class="m-0 ps-2">
							{!! __mdi("phone") !!}
							{{$info->getMeta("phone")}}
						</p>
						<p class="m-0 ps-2">
							{!! __mdi("map-marker-outline") !!}
							{{$info->getMeta("address")}}
						</p>
					</article>
					@endforeach
				</section>
			</article>
		</section>

		<footer class="box box-end">
			<article class="box-body">
				<div class="block">
					<a href="{{__url('__user')}}" 
						class="btn btn-secondary btn-sm">
						{!! __mdi("close") !!}
						{{ __("words.close") }}
					</a>
				</div>
			</article>
		</footer>
	</article>

	
	@endsection