@extends( "delta::app.sellers.layout" )
	
	@section("content")

	<form action="{{{__url("__now")}}}" 
		method="POST" 
		class="box-group">

		<section class="box box-start">
			<header class="box-header">
				<h4>{{__("words.credentials")}}</h4>
			</header>
			<article class="box-body">

				<div class="block">
					{!! $formback("firstname") !!}

					<div class="form-floating pb-2">
						<input type="text"
								name="firstname"
								value="{{old("firstname")}}"
								class="form-control{{$emo('firstname')}}"
								placeholder="{{__('words.firstname')}}"
								autocomplete="off">

						<label for="firstname">{{__('words.firstname')}}</label>
					</div>

					{!! $formback("lastname") !!}

					<div class="form-floating">
						<input type="text"
								name="lastname"
								value="{{old("lastname")}}"
								class="form-control{{$emo('lastname')}}"
								placeholder="{{__('words.lastname')}}"
								autocomplete="off">

						<label for="lastname">{{__('words.lastname')}}</label>
					</div>
				</div>

			</article>
		</section>
		<article class="box">
			<header class="box-header">
				<h4>{{__("words.account")}}</h4>
			</header>
			<section class="box-body">

				<article class="block">

					{!! $formback("user") !!}

					<div class="form-floating pb-2">
						<input type="text"
								name="user"
								value="{{old("user")}}"
								class="form-control{{$emo('user')}}"
								placeholder="{{__('words.user')}}"
								autocomplete="off">
						<label for="user">{{__('words.user')}}</label>
					</div>

					{!! $formback("email") !!}

					<div class="form-floating pb-2">
						<input type="email"
								name="email"
								value="{{old("email")}}"
								class="form-control{{$emo('email')}}"
								placeholder="{{__('words.email')}}"
								autocomplete="off">
						<label for="email">{{__('words.email')}}</label>
					</div>

					{!! $formback("password") !!}
					
					<div class="form-floating">
						<input type="text"
								name="password"
								value="{{old("password", \Str::random(12))}}"
								class="form-control"
								placeholder="{{__('words.password')}}"
								autocomplete="off">
						<label for="password">{{__('words.password')}}</label>
					</div>
				</article>

			</section>
		</article>

		<article class="box box-end">
			<section class="box-body">
				<article class="block">
					@csrf
					<a href="{{__url('__user')}}" class="btn btn-secondary btn-sm">
						{{__("words.close")}}
					</a>

					<button class="btn btn-primary btn-sm">
						{!! __mdi("content-save") !!}
						{{__("words.save")}}
					</button>
				</article>
			</section>
		</article>
	</form>

	@endsection