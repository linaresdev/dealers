		
		<nav class="lighter-navbar d-flex flex-wrap justify-content-center justify-content-lg-start">
			
			<div class="brand d-flex align-items-center">
				@if(auth("web")->check())
				<a class="nav-toggle" href="#">
					<i class="mdi mdi-wrap mdi-flip-h"></i>
				</a>
				@endif
            <a href="{{__url('/')}}" class="bt toggle">
            	<img src="{{__url('__cdn/images/wdelta.png')}}"
            			class="logon" 
            			alt="">
               Delta Comercial, S. A.
            </a>               
         </div>

	      <ul class="nav ms-auto">

	      	@if(auth("web")->check())
	      	<li class="nav-item dropdown">

	      		<a href="#" class="nav-link dropdown-toggle"
	      				data-bs-toggle="dropdown">
	      			<i class="mdi mdi-apps"></i>
	      		</a>

	      		<div class="dropdown-menu">
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
	      		</a>
	      		<div class="dropdown-menu">
	      			<a href="{{__url('profile')}}" class="dropdown-item">
	      				{{$UI->fullname}}
	      			</a>
	      			<a href="{{__url('logout')}}" class="dropdown-item">Salir</a>
	      		</div>
	      	</li>
	      	
	      	<li class="nav-item nav-toggle">
	      		<a href="#" class="nav-link">
	      			<i class="mdi mdi-wrap"></i>
	      		</a>
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
		</nav>