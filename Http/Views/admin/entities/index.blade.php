@extends("delta::admin.entities.layout")

	@section("body")

	<h4>{!! __icon($brand) !!} {{$title}}</h4>

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
			<a href="{{__url('__admin/domain/new')}}" 
				class="btn btn-primary btn-sm">
				{!! __mdi('bank-plus') !!}
				{{__("organization.new")}}
			</a>
		</header>
		<section class="box-body">
			<article class="block">
				<table class="table">
					<thead>
						<tr>
							<th class="ftool">
								<input type="checkbox">
							</th>
							<th>{{__("words.organization")}}</th>
							<th>{{__("words.entities")}}</th>

							<th class="action">
								{{__("words.actions")}}
							</th>
						</tr>
					</thead>

					<tbody>
						@foreach( $domains as $domain )
						<tr>
							<td class="ftool"> <input type="checkbox"> </td>
							<td>
								{{ $domain->group }}
							</td>
							<td>
							</td>
							<td class="action">
								<div class="dropdown dropstart">

									
									<a href="#" class="dropdown-toggle" 
										data-bs-toggle="dropdown">
										{!! __mdi("progress-wrench mdi-action") !!}
									</a>

									<div class="dropdown-menu">

										<div class="dropdown-header">
											{{__("words.mantenance")}}
										</div>
										<a href="{{__url('__entity/edit-domain/'.$domain->id)}}" class="dropdown-item ident">
											{{__("words.edit")}}
										</a>

										<a href="{{__url('__entity/delete-domain/'.$domain->id)}}" 
											class="dropdown-item ident">
											{{__("words.delete")}}
										</a>

										<div class="dropdown-header">
											{{__("words.entities")}}
										</div>

										<a href="{{__url('domain/delete-domain/'.$domain->id)}}" 
											class="dropdown-item ident">
											{{__("domain.new")}}
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