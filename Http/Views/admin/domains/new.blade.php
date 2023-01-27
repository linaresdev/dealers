@extends("delta::admin.domains.layout")

	@section("content")

	<form action="{{__url('__now')}}"
		method="POST">
		
		<article class="box box-light">
			<header class="box-header">
				<h4>{{__("words.organization")}}</h4>
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
								placeholder="{{__("organization.name")}}">

							<label for="group">
								{{__("organization.name")}}
							</label>
						</div>
					</div>

					<div class="pb-2">
						{!! $hasError("icon") !!}

						<div class="form-floating">
							<input type="text" 
								id="icon"
								name="icon"
								value="{{old('icon')}}" 
								class="form-control"
								placeholder="{{__("icon.mdi")}}">

							<label for="icon">
								{{__("icon.mdi")}}
							</label>
						</div>
					</div>	

					<div class="pb-2">
						<div class="form-check">
							<input type="radio" 
								class="form-check-input"
								id="public" 
								name="access"
								value="0"
								checked>
							<label for="public" class="form-check-label">
								{{__("words.public")}}
							</label>
						</div>
						<div class="form-check">
							<input type="radio" 
								class="form-check-input" 
								id="private" 
								name="access"
								value="1"
								@if(old("access") == 1) checked @endif>
							<label for="private" class="form-check-label">
								{{__("words.private")}}
							</label>
						</div>
					</div>

				</article>

				<article class="block">
					@csrf
					<a href="{{__url('__organization')}}" 
						class="btn btn-secondary btn-sm">
						{!! __mdi('close') !!}
						{{__('words.close')}}	
					</a>

					<button class="btn btn-primary btn-sm">
						{!! __mdi('content-save') !!}
						{{__("words.save")}}
					</button>
				</article>
			</section>
		</article>		
	</form>
	@endsection