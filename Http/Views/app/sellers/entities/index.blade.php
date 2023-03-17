@extends( "delta::app.sellers.entities.layout" )

	@section("body")

	<header class="box">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-12">				
				<div class="row mb-3">
					<div class="col-auto">
						<img src="{{__url($ent->getMeta("logo"))}}" 
							class="avatar avatar-circle avatar-80px"
							alt="">
					</div>
					<div class="col-auto pt-2">
						<h4>{{ $ent->group }}</h4>
						<p>{{$ent->getMeta("email")}}</p>
					</div>
				</div>			
			</div>

			<div class="col-lg-5 col-md-5 col-sm-12">
				<article class="row">
					<section class="col">
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
					<section class="col">
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
			</div>
		</div>

	</header>

	

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