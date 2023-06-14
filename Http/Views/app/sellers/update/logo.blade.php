@extends( "delta::app.sellers.layout" )


	@section("body")

	{!! Alert::tag("system") !!}

	<article class="box box-light">
		<section class="box-body pt-3">
			<article class="block">
				<div class="row">
					<div class="col-auto">
						<img src="{{__url($dealer->getMeta("logo"))}}"
							class="avatar avatar-circle" 
							style="width:128px;" 
							alt="@">
					</div>
					<div class="col-auto pt-4">
						<h4>{{$dealer->group}}</h4>
						<p>{{$dealer->getMeta("email")}}</p>
						<a href="{{__url('seller')}}" 
							class="btn btn-primary btn-sm">
							{{__("words.close")}}		
						</a>
					</div>
				</div>
			</article>
		</section>
	</article>

	<form action="{{__url('__now')}}" 
		method="POST"
		enctype="multipart/form-data" 
		class="box-group">

		@csrf

		<article class="box box-start">
			
			<header class="box-header">
				<h4>{{__("update.logo")}}</h4>
			</header>

			<section class="box-body">

				<article class="block">
					<div class="pb-2">

						{!! $hasError("logo") !!}

						<div class="input-group">
							<label class="input-group-text" for="logo">
								{{__("words.logo")}}
							</label>
							<input type="file" 
								name="logo"
								id="logo" 
								class="form-control"
								placeholder="{{__('words.file')}}"
								accept="image/png,
										image/jpeg,
										image/jpg,
										image/gif,
										application/png,
										application/jpg,
										application/jpeg,
										application/gif">

							<button class="btn btn-secondary">
								{{__("words.update")}}
							</button>				
						</div>
					</div>

				</article>
			</section>
		</article>
	</form>
	@endsection