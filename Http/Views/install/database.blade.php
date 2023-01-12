@extends("delta::install.layout")

	@section("body")

		<article class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12">

			<h4> Base de datos</h4>
			
			<div class="border-bottom py-1 mb-2">
				<strong class="">Motor :</strong> {{ env("DB_CONNECTION") }} 
				<strong class="ms-2">Servidor :</strong> {{ env("DB_HOST") }} 
				<strong class="ms-2">Basedatos :</strong> {{ env("DB_DATABASE") }} 
			</div>

			<div class="align-baseline border-bottom pt-0 pb-2">
				<div class="btn-group">
					<a href="{{__url('install/database/forge/refresh')}}" class="btn btn-secondary btn-sm">
						Refrescar
					</a>
					<a href="{{__url('install/database/forge/reset')}}" class="btn btn-secondary btn-sm active">
						Destruir
					</a>
				</div>
			</div>

			<div class="mt-2">
				<form class="mt-2" action="{{__url("install/database")}}" method="POST">
					<div class="alert alert-info">

						<h4 class="fs-5">
							<i class="mdi mdi-account-cog mdi-24px"></i> Cuenta Admin
						</h4>

						<p class="m-0 mb-2">
							Por motivo de seguridad es necesario definir una contraseña para el usuario administrativo. Al guardar la contraseña de acceso finalizara el proceso y se serrara el asistente de instalación.
						</p>						

						{!! $errors->first("pwd", '<p class="m-0 fs-6 text-danger"> :message </p>') !!}
						<div class="form-floating">							
							<input type="password"
									name="pwd" 
									id="pwdFloating" 
									class="form-control"
									placeholder="Su nueva clave"
									value="{{old("pwd")}}">
							<label for="pwdFloating">
								Ingrese la contraseña para el usuario administrativo
							</label>
						</div>
						
					</div>

					<div class="my-2">
						@csrf

						<a href="{{__url('install/env')}}" class="btn btn-sm btn-secondary">
							<i class="mdi mdi-arrow-left-bold"></i>
							Regresar
						</a>

						<button type="sumit" class="btn btn-primary btn-sm">
							<i class="mdi mdi-content-save"></i>
							Guardar y finalizar
						</button>
					</div>
				</form>
				
			</div>

		</article>
	@endsection