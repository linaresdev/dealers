@extends( $skin->path("landing") )

	@section("body")

		<article class="box box-light">

			<header class="box-header">
				<h4>{{__("update.password")}}</h4>
			</header>

			<section class="box-body">
				<article class="block">
					<form action="{{__url('__now')}}" method="POST">

						<div class="pt-3">
							{!! $errors->first(
								"pwd", '<p class="error"> :message </p>'
							) !!}
							<input type="password" 
								name="pwd"
								value="{{old("pwd")}}"
								class="form-control"
								placeholder="{{__("new.password")}}">
						</div>
						<div class="py-3">
							{!! $errors->first(
								"rpwd", '<p class="error"> :message </p>'
							) !!}
							<input type="password" 
								name="rpwd"
								value="{{old("rpwd")}}"
								class="form-control"
								placeholder="{{__("password.confirm")}}">
						</div>

						<div class="pb-3">							
							<input type="hidden" name="id" value="{{$user->id}}">
							<input type="hidden" name="token" value="{{$token}}">
							@csrf
							<button class="btn btn-primary">
								{{__("words.update")}}
							</button>							
						</div>
					</form>
				</article>
			</section>

		</article>
	@endsection