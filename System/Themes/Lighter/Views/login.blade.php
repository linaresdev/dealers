<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{__url('__cdn/images/wdelta.png')}}" rel='shortcut icon' type='image/png'/>

	<title> {{$title}} </title>

@section("css")

	<link href="{{__url('__lighter/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{__url('__lighter/css/mdi.min.css')}}" rel="stylesheet">
	<link href="{{__url('__lighter/css/admin.ui.css')}}" rel="stylesheet">
@show

</head>
<body>
	
	<main role="lighter" class="login {{$layout}} {{$style}}">

		
		@includeIF("lighter::partial.navbar2")		

		<article class="wrapp">

			<section class="lighter-body">
				
				@yield("content", "Lighter Container")

				<footer class="lighter-footer">

					<div class="row px-2">
						<div class="col"><hr class="divide"></div>

						<div class="col-auto">
							<img src="{{__url('__cdn/images/wdelta.png')}}"
								width="48"
								style="margin:0 0 -5px 0;" 
								alt="@">
						</div>

						<div class="col"><hr class="divide"></div>
					</div>

					<div class="pt-3 text-center fw-bold" style="color:#fff; font-size: 13px;">
						<strong class="text-danger bg-white me-1 px-1 rounded">
							&COPY; 2022 
						</strong>  
						Delta Comercial, S.A. | 
						Santo Domingo República Dominicana
					</div>
				</footer>

			</section>
		</article>

	</article>



@section("js")

	<script src="{{__url('__lighter/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{__url('__lighter/js/jquery-3.6.1.min.js')}}"></script>
	<script src="{{__url('__lighter/js/layout.ui.js')}}"></script>
@show
</body>
</html>