@extends("delta::admin.layout")

	@section("body")

	<h4>{{$title}}</h4>

	<article class="box box-light">
		<header class="box-header pb-3">
			<a href="{{__url('admin/users')}}" 
                class="btn btn-sm btn-light rounded-pill px-3 border">
                {{__("words.users")}}
            </a>
			<a href="{{__url('__users/groups/new')}}" 
				class="btn btn-sm btn-light rounded-pill px-3 border">
				{!! __mdi("account-multiple-plus") !!}
				{{__('group.new')}}
			</a>
		</header>

		<section class="box-body">
			<article class="pb-3">
				<table class="table">
					<thead>
						<tr>
							<th class="ftool">
								<input type="checkbox" name="">
							</th>
							<th>{{__("words.description")}}</th>
							<th class="action">
								{{__("words.actions")}}
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($groups as $group)
							<tr>
								<td class="ftool">
									<input type="checkbox" name="">
								</td>
								<td>{{$group->group}}</td>
								<td class="action">
									<div class="dropdown dropstart">
										<a href="#" class="dropdown-toggle" 
											data-bs-toggle="dropdown">
											{!! __mdi("progress-wrench mdi-action") !!}
										</a>

										<div class="dropdown-menu">
											<a href="{{__url('admin/users/groups/'.$group->id)}}" class="dropdown-item">
												<span class="mdi mdi-account-group-outline"></span>	
												{{__("admin.users")}}
											</a>
											<h6 class="dropdown-header">{{__("words.mantenance")}}</h6>
											<a href="#" class="dropdown-item ps-4">
												{{__("words.edit")}}
											</a>
											<a href="#" class="dropdown-item ps-4">
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