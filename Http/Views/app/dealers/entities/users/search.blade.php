		
	@if( $users->count() > 0 )
		<ul class="list-group">
			@foreach($users as $user )
			<li class="list-group-item pt-1 pb-1 px-2">
				<img src="{{__url($user->avatar)}}" 
					class="avatar avatar-circle" 
					style="width: 36px;" 
					alt="@">

					{{$user->fullname}}

					<a href="{{__url('__sync/'.$user->id)}}" 
						class="btn btn-primary btn-sm"
						style="float: right;">

						{!! __mdi("plus-thick") !!}
						{{__("words.add")}}
					</a>
			</li>
			@endforeach
		</ul>
	@else
		<ul class="list-group">
			
			<li class="list-group-item">
				{{__("search.empty")}} ...
			</li>
			
		</ul>
	@endif