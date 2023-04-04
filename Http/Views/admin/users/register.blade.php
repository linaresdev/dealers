@extends("delta::admin.layout")

	@section("body")

	<h4>{{$title}}</h4>

	<article class="box box-light">

		<header class="box-header">
			<h4>{{__("words.form")}}</h4>
		</header>

		<section class="box-body pt-3">
			<form action="{{__url('__admin/users/register')}}" 
				method="POST">
				@method("PUT")

				<article class="block">

					<div class="form-group pb-2">
						{!! $hasError("fullname") !!}

						<div class="form-floating">
							<input type="text" 
								id="fullname"
								name="fullname"
								value="{{old('fullname')}}" 
								class="form-control"
								placeholder="{{__("words.fullname")}}">

							<label for="fullname">
								{{__("words.fullname")}}
							</label>
						</div>
					</div>

					{{-- <div class="form-group pb-3">

						{!! $hasError("lastname") !!}

						<div class="form-floating">
							<input type="text" 
								id="lastname"
								name="lastname"
								value="{{old('lastname')}}" 
								class="form-control"
								placeholder="{{__("words.lastname")}}">
							<label for="lastname">
								{{__("words.lastname")}}
							</label>
						</div>
					</div>

					<div class="form-group pb-3">

						{!! $hasError("rnc") !!}

						<div class="form-floating">
							<input type="text" 
								id="rnc"
								name="rnc"
								value="{{old('rnc')}}" 
								class="form-control"
								placeholder="{{__("words.rnc")}}">
							<label for="rnc">
								{{__("words.rnc")}}
							</label>
						</div>
					</div>

					<div class="form-group pb-3">

						{!! $hasError("cellphone") !!}

						<div class="form-floating">
							<input type="tel" 
								id="cellphone"
								name="cellphone"
								value="{{old('cellphone')}}" 
								class="form-control"
								placeholder="{{__("words.cellphone")}}">
							<label for="cellphone">
								{{__("words.cellphone")}}
							</label>
						</div>	
					</div> --}}

					<div class="form-group pb-3">

						{!! $hasError("email") !!}

						<div class="form-floating">
							<input type="email" 
								id="rnc"
								name="email"
								value="{{old('email')}}" 
								class="form-control"
								placeholder="{{__("words.email")}}">
							<label for="email">
								{{__("words.email")}}
							</label>
						</div>	
					</div>

					<div class="form-group pb-3">

						{!! $hasError("pwd") !!}

						<div class="form-floating">
							<input type="password" 
								id="password"
								name="pwd"
								value="{{old('pwd')}}" 
								class="form-control"
								placeholder="{{__("user.password")}}">
							<label for="password">
								{{__("user.password")}}
							</label>
						</div>
					</div>

					<div class="form-group pb-3">

						{!! $hasError("passconfirm") !!}

						<div class="form-floating">
							<input type="password" 
								id="passconfirm"
								name="passconfirm"
								value="{{old('passconfirm')}}" 
								class="form-control"
								placeholder="{{__("user.passconfirm")}}">
							<label for="passcert">
								{{__("user.passconfirm")}}
							</label>
						</div>	
					</div>
					

					<div class="">
						@csrf
						<button type="submit" class="btn btn-outline-secondary">
							{!! __mdi("content-save") !!}
							{{__("user.create")}}
						</button>
					</div>

				</article>
			</form>
		</section>
	</article>

	@endsection