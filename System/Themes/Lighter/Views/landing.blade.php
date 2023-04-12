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
	<link href="{{__url('__lighter/css/lighter.ui.css')}}" rel="stylesheet">
@show

</head>

<body>
	
	<main role="lighter" class="container-fluid">

		<nav class="navbar navbar-lighter navbar-expand-sm">

			<a href="{{__url('/')}}" class="navbar-brand">
				<img src="{{__url('__cdn/images/logo.png')}}"
            			class="logon" 
            			alt="">

				<span class="text-toggle-sm">
					Delta Comercial, S. A.
				</span>
			</a>

			<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="mdi mdi-menu mdi-24px"></i>
			</button>

			<div id="mainNav" class="collapse navbar-collapse">		

				<ul class="navbar-nav ms-auto">

			      	@if(auth("web")->check())

			      	<li class="nav-item dropdown">

			      		<a href="#" class="nav-link dropdown-toggle"
			      				data-bs-toggle="dropdown">
			      			<i class="mdi mdi-apps"></i>
			      			<span class="text-toggle">
			      				{{__("words.aplications")}}
			      			</span>
			      		</a>

			      		<div class="dropdown-menu dropdown-menu-end">
			      			{!! Menu::tag("apps") !!}
			      		</div>

			      	</li>
			      	<li class="nav-item nav-avatar dropdown">
			      		<a href="#" class="nav-link dropdown-toggle"
			      				data-bs-toggle="dropdown">
			      			<img src="{{__url($UI->avatar)}}" 
			      					alt="@"
			      					class="avatar avatar-circle" 
			      					style="width:36px;">
			      			<span class="text-toggle">
			      				{{$UI->fullname}}
			      			</span>
			      		</a>
			      		<div class="dropdown-menu dropdown-menu-end">
			      			<a href="{{__url('profiler/'.$UI->id)}}" 
			      				class="dropdown-item toggled">
				      			{{$UI->fullname}}
			      			</a>
			      			<a href="{{__url('profiler/'.$UI->id.'/update/account')}}" 
			      				class="dropdown-item">
			      				{!! __mdi("account-reactivate") !!}
			      				{{__("update.credentials")}}
			      			</a>
			      			<a href="{{__url('profiler/'.$UI->id.'/update/password')}}" 
			      				class="dropdown-item">
			      				{!! __mdi("key") !!}
			      				{{__("update.password")}}
			      			</a>
			      			<a href="{{__url('logout')}}" class="dropdown-item">Salir</a>
			      		</div>
			      	</li>
			      	
			      	@else
			      	<li class="nav-item">
			      		<a href="{{__url('login')}}" class="nav-link{{$current('login')}}">
			      			<i class="mdi mdi-account-circle-outline"></i>
			      			{{__("words.to-access")}}
			      		</a>
			      	</li>
			      	@endif
			      </ul>
			</div>
		</nav>


		@yield("body", "Lighter Container")

		<footer class="lighter-footer">

			<div class="row px-2">
				<div class="col"><hr class="divide"></div>

				<div class="col-auto">
					<img src="{{__url('__cdn/images/wdelta.png')}}"
						width="48"
						style="margin:0 0 -10px 0;" 
						alt="@">
				</div>

				<div class="col"><hr class="divide"></div>
			</div>

			<div class="pt-3 text-center" style="color:#996; font-size: 13px;">
				<strong class="text-danger">&COPY; 2022 </strong> | 
				Delta Comercial, S.A. | 
				Santo Domingo República Dominicana
			</div>
		</footer>		

	</main>


@section("js")

	<script src="{{__url('__lighter/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{__url('__lighter/js/jquery-3.6.1.min.js')}}"></script>
	<script src="{{__url('__lighter/js/layout.ui.js')}}"></script>
@show
</body>
</html>