@extends( "delta::app.sellers.layout" )

	@section("content")

		<article class="">
			<table class="table">
				<thead>
					<tr>
						<th class="ftool">#</th>
						<th>{{__("words.account")}}</th>
						<th class="action">{{__("words.actions")}}</th>
						</tr>
				</thead>
				<tbody>
					@foreach( $users as $user )
					<tr>
						<td class="ftool">
							<input type="checkbox">
						</td>
						<td style="padding: 2px 0;">
							<img src="{{__url($user->avatar)}}" 
								class="avatar avatar-36px"
								alt="@">

							{{$user->fullname}}
						</td>
						<td class="action">
							<div class="dropdown dropstart">

								<a href="#" class="dropdown-toggle" 
									data-bs-toggle="dropdown">
									{!! __mdi("progress-wrench mdi-action") !!}
								</a>

								<div class="dropdown-menu headering">
									<a href="#" class="dropdown-item">Link</a>
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</article>

		<article class="block"></article>
	@endsection