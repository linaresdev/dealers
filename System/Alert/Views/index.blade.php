
	<div class="{{$style}}">

		@if( is_array($messages) )
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		<h4>{!! $icon !!} {{$title}}
		</h4>
		
		<hr class="m-0">

		@foreach( $messages as $message )
		<p>{{$message}}</p>
		@endforeach
		@else
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		<strong>{!! $icon !!} {{$title}} :</strong>		
		{{$messages}}
		@endif

	</div>