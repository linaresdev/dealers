@extends( "delta::admin.applications.layout" )

	@section("content")

		<article class="py-3">
			<a href="{{__url('__admin/apps/add')}}" 
				class="btn btn-outline-secondary btn-sm">
				{!! __mdi("plus-thick") !!}
				{{__("api.new")}}
			</a>
		</article>

		{!! Alert::tag("system") !!}

		@foreach($apps as $app)	

		<article class="box box-light">
			<header class="box-header">

				<div class="dropdown dropleft box-tool">

					<a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">	
						<span class="mdi mdi-dots-vertical"></span>
					</a>

					<div class="dropdown-menu">
						<a href="{{__url('__admin/apps/'.$app->id.'/edit')}}" 
							class="dropdown-item">
							{{__("words.edit")}}
						</a>

						<a href="{{__url('__admin/apps/'.$app->id.'/toggle')}}" 
							class="dropdown-item">
							@if($app->state)
							 {{__("words.disconnect")}}
							@else
							 {{__("words.connect")}}
							@endif
						</a>

						<a href="{{__url('__admin/apps/'.$app->id.'/delete')}}" 
							class="dropdown-item">
							{{__("words.delete")}}
						</a>
					</div>
				</div>
				<h4>
					<span class="mdi mdi-code-braces"></span>
					{{$app->description}}
				</h4>


			</header>

			<section class="box-body">

				{!! Alert::tag("{$app->type}-{$app->id}") !!}

				<article class="block">
					{!! $app->comment !!} 
					<a href="{{__url("__admin/apps/$app->id/show")}}"> Ver mas..</a>
				</article>

				{{-- <article class="block border mx-3 mb-3 p-3">
					<div>
						<strong>METHOD:</strong>
						<code>{{$app->method}}</code>
					</div>
					<div>
						<strong>URL:</strong>
						<code>{{__url($app->path)}}</code>
					</div>
					<div>
						<strong>Token:</strong>
						<code>{{$app->token}}</code>
					</div>
				</article> --}}

				<article class="border-top px-3 py-2 bg-light">
					Creado por nnn el {{$app->created_at}} 
				</article>
				
			</section>
		</article>

		@endforeach
	@endsection