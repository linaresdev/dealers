@extends("delta::admin.layout")

	@section("body")

	<h4>{{$title}}</h4>

	<form action="{{__url('__now')}}" method="POST">
		@method("PUT")

		<article class="box box-light">
			<header class="box-header">
				<h4>{{__("group.data")}}</h4>
			</header>

			<section class="box-body">
				<article class="block">

					<div class="mb-2">
						{!! $hasError("type") !!}

						<div class="form-floating">
							<select name="type" id="type" 
								class="form-select">
								<option value="group">
									{{__('words.group')}}
								</option>
								<option value="entity">
									{{__('words.entity')}}
								</option>
							</select>
							  <label for="type">
							  	{{__("group.type")}}
							  </label>

						</div>
					</div>
					
					<div class="mb-2">
						{!! $hasError("group") !!}

						<div class="form-floating">
							<input type="text" 
								id="group"
								name="group"
								value="{{old('group')}}" 
								class="form-control"
								placeholder="{{__("words.group")}}">

							<label for="group">
								{{__("group.domain")}}
							</label>
						</div>
					</div>

					<div class="mb-2">
						{!! $hasError("slug") !!}
						<div class="form-floating">
							<input type="text" 
								id="slug"
								name="slug"
								value="{{old('slug')}}" 
								class="form-control"
								placeholder="{{__("words.slug")}}">

							<label for="slug">
								{{__("words.slug")}}
							</label>
						</div>
					</div>

				</article>
			</section>
		</article>

		<article class="box box-light">
			<header class="box-header">
				<h4>{{ __('group.meta') }}</h4>
			</header>

			<section class="box-body">
				<article class="block">
					
					<div class="mb-2">
						{!! $hasError("email") !!}

						<div class="form-floating">
							<input type="email" 
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

					<div class="mb-2">
						{!! $hasError("phone") !!}
						<div class="form-floating">
							<input type="tel" 
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

					<div class="mb-2">
						{!! $hasError("address") !!}
						<div class="form-floating">
							<input type="tel" 
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
			<section class="box-body p-3">
				<button class="btn btn-primary btn-sm">
					{!! __mdi('content-save') !!}
					{{__("words.save")}}
				</button>
				<a href="{{__url('__users/groups')}}" class="btn btn-secondary btn-sm">
					{!! __mdi('close') !!}
					{{__("words.close")}}
				</a>
			</section>
		</article>
	</form>

	@endsection