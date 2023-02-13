@extends("delta::admin.domains.layout")

	@section("content")

		<article class="box box-light">
			<header class="box-header">
				<h4>{{__("update.rol")}}</h4>
			</header>

			<section class="box-body">
				<article class="block">
					<form action="{{__url('__now')}}" method="POST">

							{!! $hasError("group") !!}
							<div class="form-floating mb-2">
								<input type="text" 
									name="group"
									value="{{old('group', $rol->group)}}" 
									id="group" 
									class="form-control"
									placeholder="{{__("group.rols")}}">

								<label for="group">{{__("group.rols")}}</label>
							</div>

							{!! $hasError("description") !!}
							<div class="form-floating mb-2">
								<textarea name="description" class="form-control">{{$rol->getMeta("description")}} </textarea>
								<label for="group">{{__("description.short")}}</label>
							</div>

							<div class="mb-2">
								@csrf
								<a href="{{__url('__organization/security')}}" 
									class="btn btn-secondary btn-sm">
									{!! __mdi("close-thick") !!}
									{{__("words.close")}}
								</a>
								<button class="btn btn-primary btn-sm">
									{!! __mdi("plus-thick") !!}
									{{__("words.add")}}
								</button>
							</div>
						</form>

				</article>
			</section>
		</article>
	@endsection