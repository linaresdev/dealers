@extends( "delta::app.profilers.layout" )

	@section("content")
		{{-- Credentials --}}
		<article class="box box-light">
			<header class="box-header">
				<h4>{{__("words.credentials")}}</h4>
			</header>
			<section class="box-body">
				<article class="block">
					<form action="{{__url('__now/credentials')}}" method="POST">
						
						<div class="pb-3">
							{!! $errors->first(
								"firstname", '<p class="error"> :message </p>'
							) !!}
							<div class="form-floating">
								<input type="text" 
									name="firstname"
									value="{{old("firstname", $user->info("firstname"))}}"
									id="firstname" 
									class="form-control"
									placeholder="{{__("words.firstname")}}"
									autocomplete="off">
								<label for="firstname">
									{{__("words.firstname")}}
								</label>
							</div>
						</div>

						<div class="pb-3">
							{!! $errors->first(
								"lastname", '<p class="error"> :message </p>'
							) !!}
							<div class="form-floating">
								<input type="text" 
									name="lastname"
									value="{{old("lastname", $user->info('lastname'))}}"
									id="lastname" 
									class="form-control"
									placeholder="{{__("words.lastname")}}"
									autocomplete="off">
								<label for="lastname">
									{{__("words.lastname")}}
								</label>
							</div>
						</div>

						<div class="pb-3">
							{!! $errors->first(
								"publicname", '<p class="error"> :message </p>'
							) !!}
							<div class="form-floating">
								<input type="text" 
									name="publicname"
									value="{{old("publicname", $user->publicname)}}"
									id="publicname" 
									class="form-control"
									placeholder="{{__("words.publicname")}}"
									autocomplete="off">
								<label for="publicname">
									{{__("words.publicname")}}
								</label>
							</div>
						</div>

						<div class="pb-3">
							@csrf
							<button type="submit" class="btn btn-primary btn-sm">
								{!! __mdi('content-save') !!}
								{{__("words.save")}}
							</button>
						</div>
					</form>
				</article>
			</section>
		</article>

		{{-- Account --}}
		<article class="box box-light bg-light">
			<header class="box-header">
				<h4>
					{{__("words.account")}}
				</h4>
			</header>

			<section class="box-body">
				<article class="block">
					<form action="{{__url('__now/account')}}" method="POST">
						
						<div class="pb-3">
							{!! $errors->first(
								"user", '<p class="error"> :message </p>'
							) !!}
							<div class="form-floating">
								<input type="text" 
									name="user"
									value="{{old("user", $user->user)}}"
									id="user" 
									class="form-control"
									placeholder="{{__("words.user")}}"
									autocomplete="off">
								<label for="user">
									{{__("words.user")}}
								</label>
							</div>
						</div>

						<div class="pb-3">
							{!! $errors->first(
								"rnc", '<p class="error"> :message </p>'
							) !!}
							<div class="form-floating">
								<input type="text" 
									name="rnc"
									value="{{old("rnc", $user->rnc)}}"
									id="rnc" 
									class="form-control"
									placeholder="{{__("words.rnc")}}"
									autocomplete="off">
								<label for="rnc">
									{{__("words.rnc")}}
								</label>
							</div>
						</div>

						<div class="pb-3">
							{!! $errors->first(
								"email", '<p class="error"> :message </p>'
							) !!}
							<div class="form-floating">
								<input type="text" 
									name="email"
									value="{{old("email", $user->email)}}"
									id="email" 
									class="form-control"
									placeholder="{{__("words.email")}}"
									autocomplete="off">
								<label for="email">
									{{__("words.email")}}
								</label>
							</div>
						</div>

						<div class="pb-3">
							<input type="hidden" name="id" value="{{$user->id}}">
							@csrf

							<button type="submit" class="btn btn-primary btn-sm">
								{!! __mdi('content-save') !!}
								{{__("words.save")}}
							</button>
						</div>

					</form>
				</article>
			</section>
		</article>

		{{-- Contact --}}
		<article class="box box-light">
			<header class="box-header">
				<h4>
					{{__("words.contacts")}}
				</h4>
			</header>

			<section class="box-body">
				<article class="block">
					<form action="{{__url('__now/contact')}}" method="POST">
						
						<div class="pb-3">
							{!! $errors->first(
								"cellphone", '<p class="error"> :message </p>'
							) !!}
							<div class="form-floating">
								<input type="text" 
									name="cellphone"
									value="{{old("cellphone", $user->cellphone)}}"
									id="cellphone" 
									class="form-control"
									placeholder="{{__("words.cellphone")}}"
									autocomplete="off">
								<label for="cellphone">
									{{__("words.cellphone")}}
								</label>
							</div>
						</div>

						<div class="pb-3">
							{!! $errors->first(
								"phone", '<p class="error"> :message </p>'
							) !!}
							<div class="form-floating">
								<input type="text" 
									name="phone"
									value="{{old("phone", $user->info("phone"))}}"
									id="phone" 
									class="form-control"
									placeholder="{{__("words.phone")}}"
									autocomplete="off">
								<label for="phone">
									{{__("words.phone")}}
								</label>
							</div>
						</div>

						<div class="pb-3">
							<input type="hidden" name="id" value="{{$user->id}}">
							
							@csrf
							<button type="submit" class="btn btn-primary btn-sm">
								{!! __mdi('content-save') !!}
								{{__("words.save")}}
							</button>
						</div>

					</form>
				</article>
			</section>
		</article>

		{{-- Address --}}
		<article class="box box-light">
			<header class="box-header">
				<h4>
					{{__("words.address")}}
				</h4>
			</header>

			<section class="box-body">
				<article class="block">
					<form action="{{__url('__now/address')}}" method="POST">
						
						<div class="pb-3">
							{!! $errors->first(
								"address", '<p class="error"> :message </p>'
							) !!}
							<div class="form-floating">
								<input type="text" 
									name="address"
									value="{{old("address", $user->info("address"))}}"
									id="address" 
									class="form-control"
									placeholder="{{__("words.address")}}"
									autocomplete="off">
								<label for="address">
									{{__("words.address")}}
								</label>
							</div>
						</div>

						<div class="pb-3">
							@csrf
							<button type="submit" class="btn btn-primary btn-sm">
								{!! __mdi('content-save') !!}
								{{__("words.save")}}
							</button>
						</div>

					</form>
				</article>
			</section>
		</article>
	@endsection