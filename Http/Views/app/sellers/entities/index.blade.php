@extends( "delta::app.sellers.entities.layout" )

	@section("content")	

	<article class="row">
		<section class="col-lg-6 col-md-6">
			<article class="box box-light">
				<header class="box-header text-center">
					<h4>{{__("words.warranty")}}</h4>
				</header>

				<section class="box-body">
					<article class="block">
						<ul class="list-group list-group-flush">
							<li class="list-group-item d-flex justify-content-between align-items-start">

								<div class="ms-2 me-auto">
									<div class="fw-bold">
										{{__("words.registered")}}
									</div>
								</div>
								<span class="badge bg-primary rounded-pill">
									{{$warranties->count()}}
								</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-start">

								<div class="ms-2 me-auto">
									<div class="fw-bold">
										{{trans_choice("words.activated", 2)}}
									</div>
								</div>
								<span class="badge bg-primary rounded-pill">
									{{$warranties_on}}
								</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-start">

								<div class="ms-2 me-auto">
									<div class="fw-bold">
										{{trans_choice("words.inactive",2)}}
									</div>
								</div>
								<span class="badge bg-primary rounded-pill">
									{{$warranties_off}}
								</span>
							</li>
						</ul>
					</article>
				</section>
			</article>
		</section>
		<section class="col-lg-6 col-md-6">
			
			<article class="box box-light">
				<header class="box-header text-center">
					<h4>{{__("words.user")}}</h4>
				</header>
				<section class="box-body">
					<article class="block">

						<ul class="list-group list-group-flush">
							<li class="list-group-item d-flex justify-content-between align-items-start">

								<div class="ms-2 me-auto">
									<div class="fw-bold">
										{{__("words.registered")}}
									</div>
								</div>
								<span class="badge bg-primary rounded-pill">
									{{$users->count()}}
								</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-start">

								<div class="ms-2 me-auto">
									<div class="fw-bold">
										{{trans_choice("words.activated", 1)}}
									</div>
								</div>
								<span class="badge bg-primary rounded-pill">
									{{$users_on}}
								</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-start">

								<div class="ms-2 me-auto">
									<div class="fw-bold">
										{{trans_choice("words.inactive", 1)}}
									</div>
								</div>
								<span class="badge bg-primary rounded-pill">
									{{$users_off}}
								</span>
							</li>
						</ul>
						
					</article>
				</section>
			</article>

		</section>
	</article>

	<article class="box box-light">
		<header class="box-header">
			<h4>Jobs</h4>
		</header>
		<section class="box-body">

			<article class="">
				<ul class="list-group list-group-flush">
				@foreach($jobs as $job )
					<li class="list-group-item d-flex justify-content-between align-items-start py-1">
						<div class="ms-2 me-auto">
							<a href="#">{{$job->action->subject}}</a>
						</div>

						<span>{{$job->created_at}}</span>
					</li>
				@endforeach
				</ul>
			</article>

		</section>
	</article>

	

	@endsection