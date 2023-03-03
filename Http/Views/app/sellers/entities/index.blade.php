@extends( "delta::app.dealers.entities.layout" )


	@section("content")

	<article class="row">
		<section class="col-6">
			<a href="{{__url('__entity/users')}}" class="bt">
				<div class="box box-light box-lens">
					<header class="box-header">
						<h4>{{$users->count()}}</h4>
					</header>
					<footer class="box-footer box-footer-light">
						<article class="block">
							{{__("words.users")}}
						</article>
					</footer>
				</div>
			</a>			
		</section>
		<section class="col-6">
			<div class="box box-light box-lens">
				<header class="box-header">
					<h4>1</h4>
				</header>
				<footer class="box-footer box-footer-light">
					<article class="block">
						{{__("words.warranty")}}
					</article>
				</footer>
			</div>			
		</section>
	</article>

	<article class="box box-light">
		<header class="box-header">
			<h4>Title</h4>
		</header>
		<section class="box-body">
			<article class="block">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</article>
		</section>
	</article>

	@endsection