@extends( "delta::app.dealers.layout" )
	
	@section("body")

	<article class="box box-light">
		<section class="box-body pt-5">
			<article class="block">
				<div class="row">
					<div class="col-lg-3 col-sm-3  pb-3 text-center">
						<img src="{{__url($user->avatar)}}"
						class="avatar" 
						style="width: 90%;" 
						alt="@">
					</div>
					<div class="col-lg-9 col-sm-9">

						<div class="block">
							<h4>{{$user->fullname}}</h4>

							<div class="py-2 ps-3">
								<p class="m-0">
									{!! __mdi("email-outline") !!}  
									{{$user->email}}
								</p>
								<p class="m-0">
									{!! __mdi("cellphone") !!}  
									{{$user->cellphone}}
								</p>
								<p class="m-0">
									RNC: {{$user->rnc}}
								</p>
							</div>

							{{__("last.access")}} : xx-xx-xxxx xx:xx
						</div>

						<div class="block">
							<h4>
								{!! __mdi("domain") !!}
								{{__("entity.work")}}
							</h4>

							@foreach($user->groups as $info )
							<div class="border-top py-2 ps-3">
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
							</div>
							@endforeach
						</div>

						<div class="block">
							<a href="{{__url('__user')}}" class="btn btn-secondary btn-sm">
								{!! __mdi("close") !!}
								{{ __("words.close") }}
							</a>
						</div>
					</div>
				</div>
			</article>
		</section>
	</article>

	
	@endsection