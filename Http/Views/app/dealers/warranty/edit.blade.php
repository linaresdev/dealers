@extends( "delta::app.dealers.layout" )

	@section("body")

		<section class="box-group">
			<article class="box box-start">

				<header class="box-header">
					<h4>
						<i class="mdi mdi-shield-car mdi-24px"></i>
						{{__("warranty.update")}}
					</h4>
				</header>

				<section class="box-body">
					@if($errors->any())
					<div class="alert alert-danger mx-3">
						<h4 class="fs-6">
							Errores encontrados 
							<span class="badge bg-danger">{{count($errors->all())}}</span>
						</h4>
						<hr>	
					@foreach( $errors->all() as $key => $error )

						<p class="p-0 m-0">{{$key}} - {{$error}}</p>					
					@endforeach
					</div>
					@endif
				</section>

			</article>


			<form action="{{__url('__now')}}" method="POST">

				<div class="box">
					<div class="box-header">
						<h4>Credenciales</h4>
					</div>
					<div class="box-body">

						<div class="block">
							<div class="form-floating">
								<input type="text" 
										name="niv"
										value="{{old('niv', $customer->niv)}}" 
										id="nivInput" 
										class="form-control @if($errors->has('niv')) is-invalid @endif"
										placeholder="{{__('words.reference')}}"
										style="max-width: 140px;">

								<label for="nivInput">
									{{__('words.reference')}}
								</label>
							</div>
						</div>

						<div class="block">
							<div class="form-floating">
								<input type="text" 
										name="customer"
										value="{{old('customer', $customer->customer)}}" 
										id="clientInput" 
										class="form-control @if($errors->has('customer')) is-invalid @endif"
										placeholder="{{__('client.name')}}">

								<label for="clientInput">
									{{__('client.name')}}
								</label>
							</div>							
						</div>

						<div class="block">
							<div class="form-floating">
								<input type="text" 
										name="rnc"
										value="{{old('rnc', $customer->rnc)}}" 
										id="rncInput" 
										class="form-control @if($errors->has('rnc')) is-invalid @endif"
										placeholder="{{__('client.rnc')}}">

								<label for="rncInput">
									{{__('client.rnc')}}
								</label>
							</div>
						</div>

					</div>
				</div>

				<div class="box">
					<div class="box-header">
						<h4>Contacto</h4>
					</div>
					<div class="box-body">

						<div class="block">
							<div class="form-floating">
								<input type="text" 
										name="email"
										value="{{old('email', $customer->email)}}" 
										id="emailInput" 
										class="form-control @if($errors->has('email')) is-invalid @endif"
										placeholder="{{__('client.email')}}">

								<label for="emailInput">
									{{__('client.email')}}
								</label>
							</div>
						</div>

						<div class="block">
							<div class="form-floating">
								<input type="text" 
										name="cellphone"
										value="{{old('cellphone', $customer->cellphone)}}" 
										id="cellphoneInput" 
										class="form-control @if($errors->has('cellphone')) is-invalid @endif"
										placeholder="{{__('client.cellphone')}}">

								<label for="cellphoneInput">
									{{__('client.cellphone')}}
								</label>
							</div>
						</div>

					</div>
				</div>

				<div class="box">
					<div class="box-header">
						<h4>Localizacion</h4>
					</div>
					<div class="box-body">

						<div class="block">
							<div class="form-floating">
								<input type="text" 
										name="sector"
										value="{{old('sector', $customer->sector)}}"
										list="zone" 
										id="clientInput" 
										class="form-control @if($errors->has('sector')) is-invalid @endif"
										placeholder="{{__('client.sector')}}"
										onkeyup="loadZone(this)">

								<label for="clientInput">
									{{__('client.sector')}}
								</label>
							</div>
							
							<datalist id="zone">
								
							</datalist>

						</div>

						<div class="block">
							<div class="form-floating">
								<input type="text" 
										name="address"
										value="{{old('address', $customer->address)}}" 
										id="clientInput" 
										class="form-control @if($errors->has('address')) is-invalid @endif"
										placeholder="{{__('client.address')}}">

								<label for="clientInput">
									{{__('client.address')}}
								</label>
							</div>
						</div>

					</div>
				</div>

				<div class="box box-end">
					<div class="box-body">
						<div class="block">
							@csrf
							<a href="{{__url("dealer/__dealer")}}" 
								class="btn btn-secondary">
								<i class="mdi mdi-close"></i>
								{{__("words.close")}}
							</a>
							<button class="btn btn-primary">
								<i class="mdi mdi-content-save"></i>
								{{__("words.register")}}
							</button>
						</div>
					</div>
				</div>

			</form>
		</section>

		
	@endsection

	@section("js")
		@parent	<script>

			function queryZone(url, src ) {

				var query = fetch(url, {method:"get"});
					query = query.then((response) => response.text());

					query.then((data) => {
						document.getElementById("zone").innerHTML = data;
					});				
			}

			function loadZone(e) {
				
				var data 	= e.value,
					url 	= "{{__url('__ajaxD')}}";

				if( data.length > 2 ) {
					queryZone( url+"/"+data );
				}
			}
		</script>
	@endsection
