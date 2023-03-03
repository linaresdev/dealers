@extends( "delta::app.dealers.entities.layout" )
	
	@section("content")

	<article class="box box-light">

		<header class="box-header">
			<h4>					
				{{__("words.membership")}}
			</h4>
		</header>

		<section class="box-body">

			<article class="block">
				{!! __mdi("email-arrow-right-outline") !!} 
				{{ __('membership.mailship') }}
			</article>

			<article class="block">
				<form action="{{__url('__now')}}" method="POST">
					@csrf

					{!! $formback("email") !!}

					<div class="form-floating mb-2">
						<input type="email"
							name="email"
							value="{{old("email")}}"
							id="email" 
							class="form-control"
							placeholder="{{__("words.email")}}"
							autocomplete="off">	

						<label for="group">{{__("words.email")}}</label>					
					</div>

					<a href="{{__url("__user")}}" class="btn btn-secondary btn-sm">
						{!! __mdi('close') !!}
						{{__("words.close")}}
					</a>

					<button class="btn btn-primary btn-sm">
						{!! __mdi("send") !!} 
						{{ __('words.send') }}
					</button>
				</form>
			</article>

		</section>
	</article>

	@endsection