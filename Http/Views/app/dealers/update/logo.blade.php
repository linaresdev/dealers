@extends( "delta::app.dealers.layout" )


	@section("body")

	{!! Alert::tag("system") !!}

	<form action="{{__url('__now')}}" 
		method="POST"
		accept="image/*"
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
								placeholder="{{__("words.file")}}">	

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