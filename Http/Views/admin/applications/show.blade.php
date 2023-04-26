@extends( "delta::admin.applications.layout" )

	@section("content")

		<article class="box box-light">
			<header class="box-header">
				<h4>{{$api->description}}</h4>
			</header>

			<section class="box-body">
				
				<article class="block">
					{!! $api->comment !!}
				</article>

				<article class="block">
					<ul style="list-style:none;">
						<li class="text-break">
							Method: 
							<span class="px-2 py-1 bg-danger rounded text-white">
								{{$api->method}}
							</span>
						</li>
						<li class="text-break">
							Url: 
							<div class="bg-light p-2">
								<code>{{__url($api->path)}}</code>
							</div>
						</li>
						<li class="text-break">
							Token:
							<div class="bg-light p-2">
								<code>{{$api->token}}</code>
							</div> 
						</li>
					</ul>
				</article>

				<article class="block">
					<a href="{{__url('__admin/apps')}}" class="btn btn-danger btn-sm">
						{!! __mdi("reply") !!}
						{{__("words.return")}}
					</a>
				</article>
				
			</section>
		</article>
	@endsection