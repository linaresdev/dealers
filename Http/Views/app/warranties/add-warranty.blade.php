@extends( "delta::app.warranties.layout" )

	@section("body")

	<header class="py-3">
		<article class="row">
			<div class="col-auto">
				<img src="{{__url($org->getMeta('logo'))}}" 
					class="avatar avatar-circle avatar-80px" 
					alt="@">
			</div>
			<div class="col-auto pt-3">
				<h4 class="m-0">{{$org->group}}</h4>
				<small>{{$org->getMeta("email")}}</small>
			</div>
		</article>
		
	</header>

	<article class="box box-light">

		<header class="box-header">
			<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="{{__url('__warranty')}}" class="nav-link">
							{{__("words.warranties")}}
						</a>
					</li>
					<li class="nav-item">
						<a href="{{__url('__warranty/add')}}" class="nav-link active">
							{{__("warranty.add")}}
						</a>
					</li>
				</ul>
		</header>

		<section class="box-body pt-2">


			<article class="block">
				
				<form action="{{__url('__now')}}" method="POST">
					@csrf

					@if( $errors->has("noty") )
					
					<div class="alert alert-danger">
						<strong>Error</strong> {{$errors->first('noty')}}

						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif

					<div class="pb-3">
						<div class="row">
							<div class="col-lg-6 col-md-6 mb-1">
								<div class="form-floating">
									<input type="date" 
										name="date"
										value="{{old('date')}}"
										class="form-control{{$isError('date')}}"
										placeholder="DATE"
										autocomplete="off">
									<label for="niv">{{__("bay.date")}}</label>
								</div>					
							</div>
							<div class="col-lg-6 col-md-6 mb-1">
								<div class="form-floating">
									<input type="text" 
										name="niv"
										value="{{old('niv')}}"
										class="form-control{{$isError('niv')}}"
										placeholder="NIV"
										autocomplete="off">
									<label for="niv">NIV</label>
								</div>					
							</div>
							<div class="col-lg-6 col-md-6 mb-1">
								<div class="form-floating">
									<input type="text" 
										name="rnc"
										value="{{old('rnc')}}"
										class="form-control{{$isError('rnc')}}"
										placeholder="RNC"
										autocomplete="off">
									<label for="rnc">RNC</label>
								</div>					
							</div>

							<div class="col-lg-6 col-md-6 mb-1">
								<div class="form-floating">
									<input type="text" 
										name="cellphone"
										value="{{old('cellphone')}}"
										class="form-control{{$isError('cellphone')}}"
										placeholder="{{__('words.cellphone')}}"
										autocomplete="off">
									<label for="cellphome">{{__('words.cellphone')}}</label>
								</div>

							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-lg-6 col-md-6 mb-1">
							<div class="form-floating">
								<input type="text" 
									name="customer"
									value="{{old('customer')}}"
									class="form-control{{$isError('customer')}}"
									placeholder="{{__('customer.name')}}">
								<label for="customer">{{__("customer.name")}}</label>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 mb-1">
							<div class="form-floating">
								<input type="text" 
									name="email"
									value="{{old('email')}}"
									class="form-control{{$isError('email')}}"
									placeholder="{{__('words.email')}}">
								<label for="email">{{__('words.email')}}</label>
							</div>
						</div>


						<div class="col-lg-6 col-md-6 mb-1">
							<div class="form-floating">
								<input type="text" 
									name="address"
									value="{{old('address')}}"
									class="form-control{{$isError('address')}}"
									placeholder="{{__('words.address')}}"
									autocomplete="off">
								<label for="address">{{__('words.address')}}</label>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 mb-1">
							<div class="form-floating">
								<input type="text" 
									name="sector"
									list="zone" 
									value="{{old('sector')}}"
									class="form-control{{$isError('sector')}}"
									placeholder="{{__('words.sector')}}"
									autocomplete="off"
									onkeyup="loadZone(this)">
								<label for="sector">{{__('words.sector')}}</label>
							</div>
							<datalist id="zone">
								<option>{{__("search.zone")}}...</option>
							</datalist>
						</div>
					</div>

					<div class="pb-3">

						<input class="idZone" type="hidden" name="code" value="">

						<a href="{{__url('warranty/'.$org->id)}}" 
							class="btn btn-secondary">
							{!! __mdi('close') !!}
							{{__("words.close")}}	
						</a>

						<button class="btn btn-primary">
							{!! __mdi("content-save") !!}
							{{ __("words.save") }}
						</button>
					</div>
					
				</form>

			</article>
		</section>
	</article>

	@endsection

	@section("js")
		@parent <script>
			
			function loadZone(e){
				if( (data = e.value).length > 1 ) {					
					jQuery.get("{{__url('__zone')}}/"+data, function(data) {
						jQuery("#zone").html(data);
					});
				}
			}
			
		</script>
	@endsection