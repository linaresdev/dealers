@extends("delta::admin.layout")

	@section("body")

	<h4>{{$title}}</h4>

	<article class="box box-light">

		<header class="box-header">
			<h4>{{$user->fullname}}</h4>
			<small class="d-block">{{__("password.update")}}</small>
		</header>

		<section class="box-body pt-3">
			<form action="{{__url('__now')}}" 
				method="POST">

				<article class="block">

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
						<a href="{{__url("__admin/users")}}" class="btn btn-danger">
                            {!! __mdi("close") !!}
                            {{__("words.close")}}
	                    </a>
					</div>

				</article>
			</form>
		</section>
	</article>

	@endsection