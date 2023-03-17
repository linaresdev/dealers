@extends("delta::admin.domains.layout")

	@section("content")

	<article class="box box-light">
		<section class="p-3">
			<div class="input-group">

				<span class="input-group-text bg-light"></span>	

				<input type="text" 
					placeholder="{{__('words.finder')}}.." 
					class="form-control">

				<span class="input-group-text bg-light"></span>				
			</div>

		</section>
	</article>

	<article class="box box-light">
		
		<header class="box-header">
			<a href="{{__url('__admin/organizations/new')}}" 
				class="btn btn-primary btn-sm">
				{!! __mdi('domain-plus') !!}
				{{__("organization.new")}}
			</a>
		</header>

		<section class="box-body">
			<article class="block">
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="ftool">
								<input type="checkbox">
							</th>
							<th>{{__("words.organization")}}</th>
							<th>{{__("words.access")}}</th>

							<th class="action">
								{{__("words.actions")}}
							</th>
						</tr>
					</thead>

					<tbody>
						@foreach( $domains as $org )
						<tr>
							<td class="ftool"> <input type="checkbox"> </td>
							<td class="descriptor">
								<a href="{{__url('__organization/'.$org->slug."/users")}}">
									{!! __mdi($org->icon) !!}
									{{ $org->group }}
								</a>
							</td>
							<td>
								<div class="dropdown dropend">
									<a href="#" class="bt dropdown-toggle" 
										data-bs-toggle="dropdown">
										@if($org->access)
										{{__("words.private")}}
										@else
										{{__("words.public")}}
										@endif
									</a>
									<div class="dropdown-menu">
										@if($org->access == 1)
										<a href="{{__url("__now/toggle/".$org->id."/0")}}" 
											class="dropdown-item ">
											{!! __mdi('checkbox-blank-outline') !!}
											{{__("words.public")}}
										</a>
										<span class="dropdown-item">
											{!! __mdi('checkbox-intermediate') !!}
											{{__("words.private")}}
										</span>
										@else
										<span class="dropdown-item">
											{!! __mdi('checkbox-intermediate') !!}
											{{__("words.public")}}
										</span>
										<a href="{{__url("__now/toggle/".$org->id."/1")}}" 
											class="dropdown-item ">
											{!! __mdi('checkbox-blank-outline') !!}
											{{__("words.private")}}
										</a>
										@endif
									</div>
								</div>
							</td>
							<td class="action">
								<div class="dropdown dropstart">

									
									<a href="#" class="dropdown-toggle" 
										data-bs-toggle="dropdown">
										{!! __mdi("progress-wrench mdi-action") !!}
									</a>

									<div class="dropdown-menu">

										<div class="dropdown-header ps-2">
											{{$org->group}}
										</div>

										<a href="{{__url('__organization/edit/'.$org->id)}}" class="dropdown-item">
											{!! __mdi("pencil") !!}
											{{__("words.edit")}}
										</a>
										<a href="{{__url('__organization/delete/'.$org->id)}}" 
											class="dropdown-item ">
											{!! __mdi("delete") !!}
											{{__("words.delete")}}
										</a>
										
									</div>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</article>
		</section>
	</article>
	@endsection