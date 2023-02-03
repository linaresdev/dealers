@extends("delta::admin.domains.layout")

	@section("content")

	<article class="box box-light">

		<header class="box-header">
			<h4>{{__("entity.new")}}</h4>
		</header>

		<section class="box-body">
			<form action="{{__url('__now')}}" method="POST">				

				<article class="block">
					<div class="pb-2">
						{!! $hasError("logo") !!}
						<div class="input-group">
							<label class="input-group-text" for="logo">
								{{__("words.logo")}}
							</label>
							<input type="file" 
									name="logo"
									id="logo" 
									class="form-control"
									placeholder="{{__("words.file")}}">
							
						</div>
					</div>

					<div class="pb-2">
						{!! $hasError("phone") !!}

						<div class="form-floating">
							<input type="tel" 
								name="phone" 
								value="{{old("phone")}}" 
								id="phone" 
								class="form-control"
								placeholder="{{__("words.phone")}}">
							<label for="phone">{{__("words.phone")}}</label>
						</div>
					</div>

					<div class="pb-2">
						{!! $hasError("email") !!}

						<div class="form-floating">
							<input type="email" 
								name="email" 
								value="{{old("email")}}" 
								id="email" 
								class="form-control"
								placeholder="{{__("words.email")}}">
							<label for="email">{{__("words.email")}}</label>
						</div>
					</div>

					<div class="pb-2">
						{!! $hasError("address") !!}
						<div class="form-floating">
							<input type="text" 
								name="address" 
								value="{{old("address")}}" 
								id="address" 
								class="form-control"
								placeholder="{{__("words.address")}}">
							<label for="address">{{__("words.address")}}</label>
						</div>
					</div>

					<div class="pb-2">
						@csrf
						<a href="{{__url('__organization/'.$org->slug)}}" 
							class="btn btn-secondary btn-sm">
							{!! __mdi("close") !!}
							{{__("words.close")}}
						</a>

						<button class="btn btn-primary btn-sm" type="submit">
							{!! __mdi("content-save") !!}
							{{__("words.save")}}
						</button>
					</div>
				</article>
			</form>
		</section>
	</article>
	@endsection