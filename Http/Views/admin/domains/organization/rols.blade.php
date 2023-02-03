@extends("delta::admin.domains.layout")

	@section("content")

	<article class="box box-light">
		<header class="box-header">
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a href="{{__url('__organization')}}" 
						class="nav-link pt-2 pb-1">
						{!! __mdi("home") !!}
						{{__("words.home")}}
					</a>
				</li>
				<li class="nav-item">
					<a href="{{__url('__entity')}}" 
						class="nav-link pt-2 pb-1 active">
						{!! __mdi("shield-account") !!}
						{{__("words.authorize")}}
					</a>
				</li>
			</ul>
		</header>

		<section class="box-body">
			<article class="block">				
				<section class="row">
					<article class="col-5">

						<h4>{{__("rol.form")}}</h4>

						<form action="{{__url('__now')}}" method="POST">

							{!! $hasError("group") !!}
							<div class="form-floating mb-2">
								<input type="text" 
									name="group"
									value="{{old('group')}}" 
									id="group" 
									class="form-control"
									placeholder="{{__("group.rols")}}">

								<label for="group">{{__("group.rols")}}</label>
							</div>

							{!! $hasError("description") !!}
							<div class="form-floating mb-2">
								<textarea name="description" class="form-control"></textarea>
								<label for="group">{{__("description.short")}}</label>
							</div>

							<div class="mb-2">
								@csrf
								<a href="{{__url('__organization')}}" 
									class="btn btn-secondary btn-sm">
									{!! __mdi("close-thick") !!}
									{{__("words.close")}}
								</a>
								<button class="btn btn-primary btn-sm">
									{!! __mdi("plus-thick") !!}
									{{__("words.add")}}
								</button>
							</div>

						</form>

					</article>

					<article class="col-7">

						<h4>{{__("words.rols")}}</h4>

						<ul class="list-group list-group-flush">
							@foreach( $rols as $rol )
							<li class="list-group-item">
								<div class="fw-bold">
									<a href="{{__url('__entity/rol/'.$rol->id)}}">
										{!! __mdi($rol->icon) !!}
										{{__("words.".$rol->slug)}}
									</a>
								</div>
								{{$rol->getMeta("description")}}
							</li>
							@endforeach
						</ul>
						
					</article>
				</section>
			</article>

		</section>
	</article>
	@endsection