@extends("delta::admin.domains.organization.layout")

	@section("content")	

	<article class="block">
		<input type="text" 
			name="src"
			value="{{old('src')}}" 
			class="form-control"
			placeholder="{{__('search.users')}}" 
			onkeyup="sourceUser(this)"
			autocomplete="off">

		<div id="users"></div>
	</article>

	<article class="block">
		<table class="tb">
			<tbody>
			@foreach( $org->users as $user)
			<tr>

				<td>
					<img src="{!! __url($user->avatar) !!}" 
						class="avatar avatar-circle"
						style="width:36px;" 
						alt="">
					{{$user->fullname}}
				</td>

				<td style="text-align:right;">
					<a href="{{__url('__entity/users/'.$user->id."/detach")}}" 
						class="btn btn-outline-primary btn-sm">
						{{__("words.remove")}}
					</a>
				</td>

			</tr>
			@endforeach
			</tbody>
		</table>
	</article>
	@endsection

	@section("js")
		@parent<script type="text/javascript">

			function toggleCheckbox( e ) {
				var inp = document.querySelectorAll("td input[type=checkbox]");

				if(e.checked) {
					for (var i=0; i < inp.length; i++ ) {
						inp[i].checked = true;
					}
				}
				else {
					for (var i=0; i < inp.length; i++ ) {
						inp[i].checked = false;
					}
				}
			}

			function sourceUser( inp ) {

				if( inp.value.length > 0 ) {
					var url 	= "{{__url('__now/search')}}",
						url 	= url+"/"+inp.value,
						query 	= query = fetch(url, {method:"get"});

						query = query.then((response) => response.text());

						query.then((data) => {
							console.log(data);
							document.getElementById("users").innerHTML = data;
						});	
				}
			}
		</script>
	@ensection