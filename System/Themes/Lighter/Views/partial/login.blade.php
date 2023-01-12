@extends("lighter::login")

	@section("css")
	@parent<style type="text/css">
		body {
			background: #f0f0f0;
			background: url("{{__url('__lighter/images/loginbg.jpg')}}");
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			height: 100vh;
		}
	</style>
	@endsection

	@section("content")
		<article class="col-lg-6 offset-lg-6 col-md-6 offset-md-6 col-sm-8 offset-sm-2">
			@if( auth("web")->guest() )

			<div class="login @if($errors->any()) login-error @endif">
				<div class="login-body">

					<form action="{{__url('login')}}" method="POST">
						@if( $errors->any() )
						{!! $errors->first(
							'login', '<p class="error mb-1 text-danger">:message</p>'
						) !!}							
						@endif
						<div class="form-floating">

							<input type="email" 
										name="email" 
										value="{{old('email')}}" 
										class="form-control"
										placeholder="Correo electronico">

							<label for="email">Correo electronico</label>

						</div>

						<div class="form-floating">
							
							<input type="password" 
										name="pwd" 
										value="{{old('pwd')}}" 
										class="form-control"
										placeholder="Contraseña">

							<label for="email"> Contraseña </label>

						</div>

						<div class="my-2">
							@csrf

							<div class="row">
								<div class="col-auto">
									<button type="submit" 
												class="btn btn-secondary btn-sm">
										<i class="mdi mdi-logout"></i> Acceder
									</button>
								</div>

								<div class="col-auto">

									<div class="form-check">
										<input type="checkbox" 
													name="remember" 
													class="form-check-input" 
													id="remember">

										<label class="form-check-label" 
													for="remember">
											Recordar acceso
										</label>
									</div>
								</div>

							</div>

						</div>
						
					</form>
				</div>

				<div class="login-footer">
					<div class="row tool">
						<div class="col-auto">
							<a href="#">
								<i class="mdi mdi-lifebuoy"></i>Ayuda
							</a>
						</div>
						<div class="col-auto">
							<a href="#">
								<i class="mdi mdi-gift"></i>
								Solicitar mi membresia
							</a>
						</div>
					</div>
				</div>
			</div>

			@else
			<div class="login login-warning">
				<div class="login-body">

					<h4>Warning!</h4>

					<div class="error">Ya esta autenticado</div>

					<div class="p-2">
						<a href="{{__url('/')}}" 
								class="btn btn-outline-secondary">
								Salir de esta pagina	
						</a>
					</div>
				</div>
			</div>
			@endif

		</article>
	@endsection