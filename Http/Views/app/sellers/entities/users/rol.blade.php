@extends( "delta::app.sellers.entities.layout" )
	
	@section("content")

		<article class="box box-light">
			<header class="box-header">
				<h4>{{$user->fullname}}</h4>
			</header>

			<section class="box-body pt-2">
				
				<article class="block">

					<h4>{{$title}}</h4>

					<form action="{{__url("__now")}}" method="POST">
						@csrf
						<div class="form-check ms-3">
							<input type="checkbox"
								name="view"
								value="1" 
								id="view" 
								class="form-check-input"
								@if($rol->view) checked @endif>
							<label for="view" class="form-check-label">
								{{__("words.view")}}
							</label>
						</div>

						<div class="form-check ms-3">
							<input type="checkbox"
								name="insert"
								value="1" 
								id="insert" 
								class="form-check-input"
								@if($rol->insert) checked @endif>
							<label for="insert" class="form-check-label">
								{{__("words.insert")}}
							</label>
						</div>

						<div class="form-check ms-3">
							<input type="checkbox"
								name="update"
								value="1" 
								id="update" 
								class="form-check-input"
								@if($rol->update) checked @endif>
							<label for="update" class="form-check-label">
								{{__("words.update")}}
							</label>
						</div>
						<div class="form-check ms-3 mb-3">
							<input type="checkbox"
								name="delete"
								value="1" 
								id="delete" 
								class="form-check-input"
								@if($rol->delete) checked @endif>
							<label for="delete" class="form-check-label">
								{{__("words.delete")}}
							</label>
						</div>

						<div>
							<a href="{{__url('__user')}}" 
								class="btn btn-danger btn-sm">
								{!! __mdi("close") !!}
								{{__("words.close")}}		
							</a>
							<button class="btn btn-primary btn-sm" type="submit">
								{!! __mdi("shield-refresh-outline") !!}
								{{__("update.rol")}}
							</button>
						</div>
					</form>
				</article>
			</section>
		</article>
	@endsection