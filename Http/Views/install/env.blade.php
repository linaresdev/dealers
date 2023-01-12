@extends("delta::install.layout")

	@section("body")

		<article class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12">

			<h4>{{$title}}</h4>
			
			<form action="{{__url('install/env')}}" method="POST">
				
				<div class="form-group">
					<textarea name="env" 
							class="form-control"
							spellcheck="false">{!! $env !!}</textarea>
				</div>

				<div class="form-group pt-2">
					@csrf

					<a href="{{__url('install')}}" class="btn btn-sm btn-secondary">
						<i class="mdi mdi-arrow-left-bold"></i>
						Regresar
					</a>

					<button type="submit" 
							class="btn btn-sm btn-success">
						<i class="mdi mdi-content-save"></i>
						Actualizar
					</button>

					<a href="{{__url('install/database/forge')}}" class="btn btn-sm btn-primary">
						<i class="mdi mdi-database"></i>
						Base de datos
					</a>
				</div>

			</form>
			

		</article>
	@endsection