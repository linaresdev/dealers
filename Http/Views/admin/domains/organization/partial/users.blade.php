	
	<form action="{{__url('__now')}}" method="POST" class="bg-light mt-1 p-2">
		@csrf

		<table class="table mt-2">
			<thead>
				<tr>
					<th class="ftool">
						<input type="checkbox" 
							onchange="toggleCheckbox(this)">
					</th>
					<th>{{__("words.name")}}</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td class="ftool">
						<input type="checkbox" name="usr[]" value="{{$user->id}}">
					</td>
					<td>{{$user->fullname}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<div style="text-align: right;">
			<button class="btn btn-secondary btn-sm">
				{!! __mdi("plus") !!}
				{{__("user.add")}}
			</button>
		</div>
	</form>