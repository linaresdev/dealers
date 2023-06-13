@extends("delta::admin.layout")

	@section("body")

	<h4>{{$title}}</h4>

	<article class="box box-light">

		<header class="box-header">
			<h4>{{$user->fullname}}</h4>
		</header>

		<section class="box-body">
			<article class="block">
				{!! Alert::tag("system") !!}
				{{__("programmer.change.password")}}
			</article>

			@if(($temporizador = $user->passwordExpire()) == null )
			<article class="block">
				<form action="{{__url('__now')}}" method="POST">
					@csrf
					<div class="row">
						<div class="col-lg-6">
							<div class="input-group">
								<input type="date"
									name="date"
									value="{{old('date')}}" 
									class="form-control">
								<button type="submit" class="btn btn-secondary">
									{{__("words.create")}}
								</button>
							</div>
						</div>
					</div>					
				</form>
			</article>
			@else
			<article class="block">
				<table class="table">
					<thead>
						<tr>
							<th>{{__("words.date")}}</th>
							<th>{{__("words.state")}}</th>
							<th class="action">{{__("words.action")}}</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{$temporizador->created_at->format("Y-m-d")}}</td>
							<td>
								@if( $temporizador->created_at->isFuture() )
									{{__("words.wait")}}...
								@else
									{{__("register.old")}}
									{{now()->parse($temporizador->created_at)->diffForHumans()}}
								@endif
								
							</td>
							<td class="action">
								<a href="{{__url('__now/'.$temporizador->id.'/delete')}}" 
									class="btn btn-sm border-0 m-1 py-0 px-1 btn-light">
									{!! __mdi("delete") !!}
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</article>
			@endif
		</section>
	</article>

	@endsection