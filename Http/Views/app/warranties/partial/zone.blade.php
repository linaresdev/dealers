
	@foreach( $locations as $location )
		<option data-value="{{$location->id}}"> 
			{{$location->description}}
		</option>
	@endforeach