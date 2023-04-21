@extends( "delta::admin.applications.layout" )

	@section("content")

		<article class="box box-light">

			<header class="box-header">
				<h4>{{__("apps.form")}}</h4>
			</header>

			<section class="box-body">

			
				{!! Alert::tag("system") !!}
				

				<form action="{{__url('__now')}}"
					method="POST" 
					class="block">
					@csrf

					{!! $errors->first(
						"description", '<p class="error"> :message </p>'
					) !!}
					<div class="form-floating mb-3">
						<input type="text"
								name="description"
								value="{{old("description")}}" 
								id="description" 
								class="form-control"
								placeholder="{{__('words.description')}}"
								autocomplete="off">
						<label for="description">{{__("words.description")}}</label>
					</div>

					{!! $errors->first(
						"method", '<p class="error"> :message </p>'
					) !!}
					<div class="form-floating mb-3">
						<select name="method" 
								id="method" 
								aria-label="method"
								class="form-select">
							<option value="GET" @if(old("method") == "GET") selected @endif>
								GET
							</option>
							<option value="POST" @if(old("method") == "POST") selected @endif>
								POST
							</option>
							<option value="ANY" @if(old("method") == "ANY") selected @endif>
								{{strtoupper(__("words.any"))}}
							</option>
						</select>
						<label for="method">
							{{__("words.method")}}
						</label>
					</div>

					{!! $errors->first(
						"path", '<p class="error"> :message </p>'
					) !!}
					<div class="form-floating mb-3">
						<input type="text"
								name="path"
								value="{{old("path")}}"
								id="path" 
								class="form-control"
								placeholder="PATH"
								autocomplete="off">
						<label for="path">
							{{__("url.base")}}
						</label>
					</div>
					
					{!! $errors->first(
						"controller", '<p class="error"> :message </p>'
					) !!}
					<div class="form-floating mb-3">
						<input type="text"
								name="controller"
								value="{{old("controller")}}"
								id="controller" 
								class="form-control"
								placeholder="{{__('words.controller')}}"
								autocomplete="off">
						<label for="controller">
							{{__('words.controller')}}
						</label>
					</div>

					{!! $errors->first(
						"action", '<p class="error"> :message </p>'
					) !!}
					<div class="form-floating mb-3">
						<textarea 
							name="comment" 
							id="commend" 
							class="form-control"
							placeholder="{{__('words.action')}}"
							style="min-height: 150px;">{{old("comment")}}</textarea>

						<label for="comment">
							{{__('words.comment')}}
						</label>
					</div>

					<div class="mb-3">

						<a href="{{__url('__admin/apps')}}" class="btn btn-danger">
							{!! __mdi("close") !!}
							{{__("words.close")}}
						</a>

						<button class="btn btn-primary">
							{!! __mdi("content-save") !!}
							{{__("words.save")}}
						</button>
					</div>

				</form>
			</section>
		</article>
	@endsection