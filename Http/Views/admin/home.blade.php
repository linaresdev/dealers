@extends("delta::admin.layout")
		
	@section("body")

		<article class="box box-light">
			<header class="box-header">
				<h4>{{$title}}</h4>
			</header>

			<section class="box-body">
				<article class="bg-secondary p-2">
					<video style="width: 100%;" controls autoplay>
						<source src="{{__url('__lightmedia/preview.webm')}}" type="video/webm">
						Tu navegador no  soporta video.
					</video>
				</article>
			</section>
		</article>
	@endsection
