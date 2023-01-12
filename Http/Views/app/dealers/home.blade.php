@extends( "delta::app.dealers.layout" )

		@section("body")

			<section class="box box-light">

				<header class="box-header">
					<h4>
						<i class="mdi mdi-shield-car mdi-24px"></i>
						{{__("words.warranties")}}
					</h4>
				</header>

				<article class="box-body pt-1">

					<div class="block">
						<a href="{{__url('dealer/__dealer/warranty/add')}}" class="btn btn-primary btn-sm ">
							<i class="mdi mdi-seal-variant"></i>
							{{__("warranty.add")}}
						</a>
					</div>

					@if( $customers->count() > 0 )
					<div class="block">
						<table class="table table-slim table-hover">
							<thead>
								<tr>
									<th width="90">NIV</th>
									<th>{{__("words.clients")}}</th>
									<th style="text-align: right;">{{__("words.actions")}}</th>
								</tr>
							</thead>

							<tbody>
								@foreach($customers as $row)
								<tr>
									<td width="90">{{ $row->niv }}</td>
									<td>{{ $row->customer }}</td>
									<td class="action" style="text-align: right;">
										<div class="dropdown slimdawn dropstart">
											<button 
													class="btn dropdown-toggle"
													type="button"
													data-bs-toggle="dropdown">
												<i class="mdi mdi-progress-wrench mdi-24px"></i>
											</button>
											<div class="dropdown-menu">
												<h6 class="dropdown-header">
													{{__("words.information")}}
												</h6>
												<a href="{{__url('__now/warranty/info/'. $row->id)}}" class="dropdown-item">
													<i class="mdi mdi-badge-account-outline mdi-18px"></i>
													{{__("words.credentials")}}
												</a>
												
												<h6 class="dropdown-header">
													{{__("words.mantenance")}}
												</h6>
												<a href="#" class="dropdown-item">
													<i class="mdi mdi-toggle-switch-off-outline"></i>
													{{__("words.activate")}}
												</a>
												<a href="{{__url('__now/warranty/edit/'.$row->id)}}" class="dropdown-item">
													<i class="mdi mdi-progress-pencil"></i>
													{{__("words.edit")}}
												</a>
												<a href="{{__url('__now/warranty/delete/'.$row->id)}}" class="dropdown-item">
													<i class="mdi mdi-delete-outline"></i>
													{{__("words.delete")}}
												</a>
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					@else
					<div class="block">
						<div class="alert alert-info">
							{{__("warranty.empty")}}
						</div>
					</div>
					@endif
				</article>
			</section>
		@endsection

	