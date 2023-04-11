@extends( $skin->path("desmilitary") )

	@section("body")
	
	<article class="row">
		<section class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12">

			
			<article class="box box-light">
				<header class="box-header mb-2">
					<h4>
						{!! __mdi("gift") !!}
						{{__("register.membership")}}
					</h4>

					{!! Alert::tag("system") !!}
				</header>

				<section class="box-body">
					@if($passes)
					<article class="block">
						<form action="{{__url('__now')}}" method="POST">

							<div class="pb-2">
								{!!$errors->first(
									"firstname", '<p class="error error-slow">:message </p>'
								)!!}
								<div class="form-floating">
									<input type="text"
										id="fullname" 
										name="fullname"
										value="{{old('fullname')}}" 
										class="form-control"
										placeholder="{{__("words.fullname")}}"
										autocomplete="off">

									<label for="fullname">{{__("words.fullname")}}</label>
								</div>
							</div>

							<div class="pb-2">
								{!!$errors->first(
									"cellphone", '<p class="error error-slow">:message </p>'
								)!!}
								<div class="form-floating">
									<input type="text"
										id="cellphone" 
										name="cellphone"
										value="{{old('cellphone')}}" 
										class="form-control"
										placeholder="{{__("words.cellphone")}}"
										autocomplete="off">
										
									<label for="cellphone">{{__("words.cellphone")}}</label>
								</div>
							</div>

							<div class="pb-2">
								{!!$errors->first(
									"email", '<p class="error error-slow">:message </p>'
								)!!}
								<div class="form-floating">
									<input type="email"
										id="email" 
										name="email"
										value="{{old('email', $request->email)}}" 
										class="form-control"
										placeholder="{{__("words.email")}}"
										autocomplete="off">
										
									<label for="email">{{__("words.email")}}</label>
								</div>
							</div>

							<div class="pb-2">
								{!!$errors->first(
									"pwd", '<p class="error error-slow">:message </p>'
								)!!}
								<div class="form-floating">
									<input type="password"
										id="pwd" 
										name="pwd"
										value="{{old('pwd')}}" 
										class="form-control"
										placeholder="{{__("words.pwd")}}">
										
									<label for="pwd">{{__("words.pwd")}}</label>
								</div>
							</div>
							<div class="pb-2">
								{!!$errors->first(
									"rpwd", '<p class="error error-slow">:message </p>'
								)!!}
								<div class="form-floating">
									<input type="password"
										id="rpwd" 
										name="rpwd"
										value="{{old('rpwd')}}" 
										class="form-control"
										placeholder="{{__("words.rpwd")}}">
										
									<label for="pwd">{{__("words.rpwd")}}</label>
								</div>
							</div>

							<div class="pb-2">
								<input type="hidden" name="entity" value="{{$dealer}}">
								@csrf
								<a href="#" class="btn btn-danger btn-sm">
									{!! __mdi("close") !!} {{__("words.close")}}
								</a>
								<button class="btn btn-primary btn-sm" type="submit">
									{!! __mdi("content-save") !!}
									{{__("words.save")}}
								</button>
							</div>

						</form>
					</article>
					@else
					<article class="p-3">
						@if( $error->any() )
						<div class="alert alert-danger m-0">
							<strong>Error</strong> : {{$error->first("token")}}	
						</div>
						@endif
					</article>
					<article class="block">
						{{__("close.eyelash")}}
					</article>
					@endif
				</section>
			</article>
		</section>
	</article>
	
	@endsection