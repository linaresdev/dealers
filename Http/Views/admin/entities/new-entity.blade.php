@extends("delta::admin.entities.layout")

	@section("body")

	<h4>{!! __icon($brand) !!} {{$title}}</h4>

	<form action="{{__url('__now')}}" 
		method="POST">

		<article class="box box-light">
			<header class="box-header">
				<h4>{{__("words.entity")}}</h4>
			</header>
			<section class="box-body">
				<article class="block">
					<div class="pb-2">
						{!! $hasError("group") !!}

						<div class="form-floating">
							<input type="text" 
								id="group"
								name="group"
								value="{{old('group')}}" 
								class="form-control"
								placeholder="{{__("group.domain")}}">

							<label for="group">
								{{__("group.domain")}}
							</label>
						</div>
					</div>					
				</article>
			</section>
		</article>

		<article class="box box-light">
			<header class="box-header">
				<h4>{{__('entity.meta')}}</h4>
			</header>

			<section class="box-body">
				<article class="block">
					<div class="pb-2">
						{!! $hasError("email") !!}

						<div class="form-floating">
							<input type="text" 
								id="email"
								name="email"
								value="{{old('email')}}" 
								class="form-control"
								placeholder="{{__("words.email")}}">

							<label for="email">
								{{__("words.email")}}
							</label>
						</div>
					</div>

					<div class="pb-2">
						{!! $hasError("phone") !!}

						<div class="form-floating">
							<input type="text" 
								id="phone"
								name="phone"
								value="{{old('phone')}}"
								class="form-control"
								placeholder="{{__("words.phone")}}">

							<label for="phone">
								{{__("words.phone")}}
							</label>
						</div>
					</div>

					<div class="">
						{!! $hasError("address") !!}

						<div class="form-floating">
							<input type="text" 
								id="address"
								name="address"
								value="{{old('address')}}" 
								class="form-control"
								placeholder="{{__("words.address")}}">

							<label for="address">
								{{__("words.address")}}
							</label>
						</div>
					</div>

				</article>
			</section>
		</article>

		<article class="box box-light">
			<div class="p-3">
				@csrf

				<a href="{{__url('__entity')}}" 
					class="btn btn-secondary btn-sm">
					{!! __mdi('close') !!}
					{{__("words.close")}}	
				</a>
				<button type="submit" class="btn btn-primary btn-sm">
					{!! __mdi('content-save') !!}
					{{__("words.save")}}
				</button>
			</div>
		</article>
	</form>
	@endsection