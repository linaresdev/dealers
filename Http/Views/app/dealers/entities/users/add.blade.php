@extends( "delta::app.dealers.entities.layout" )
	
	@section("content")

	<article class="box box-light">
		<header class="box-header">
			<h4>
				{{__("user.add")}}
			</h4>
		</header>

		<section class="box-body">
			<article class="block">
				<input type="text" 
					name="src" 
					class="form-control"
					placeholder="{{__('user.search')}}"
					autocomplete="off"
					onkeyup="sourceUser(this)">
			</article>
			
			<article class="block">
				<div class="callback">
					<span class="text-mute">
						{{__("empty.data")}}
					</span>
				</div>
			</article>
		</section>
	</article>
	@endsection

	@section("js")
		@parent <script>
			var box = document.querySelector(".callback");

			function getUsers( url ) {				
				query 	= fetch(url, {method:"get"});
				query 	= query.then((response) => response.text());

				query.then((data) => {
					box.innerHTML = data;
				});			
			}

			function sourceUser(src) {
				let data = src.value;

				if(data.length == 0 ) {
					box.innerHTML="{{__("user.search")}}";
				}

				if( data.length >= 1  ) {
					getUsers("{{__url('__entity/users/add')}}/"+data);	
				}
			}
		</script>
	@endsection