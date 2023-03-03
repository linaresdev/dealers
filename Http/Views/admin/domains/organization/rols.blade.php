@extends("delta::admin.domains.organization.layout")

	@section("content")		

		<section class="">
			<article class="block">				
				<section class="row">
					<article class="col-5">

						<h4>{{__("rol.form")}}</h4>

						<form action="{{__url('__now')}}" method="POST">

							{!! $hasError("group") !!}
							<div class="form-floating mb-2">
								<input type="text" 
									name="group"
									value="{{old('group')}}" 
									id="group" 
									class="form-control"
									placeholder="{{__("group.rols")}}">

								<label for="group">{{__("group.rols")}}</label>
							</div>

							{!! $hasError("description") !!}
							<div class="form-floating mb-2">
								<textarea name="description" class="form-control"></textarea>
								<label for="group">{{__("description.short")}}</label>
							</div>

							<div class="mb-2">
								@csrf
								<a href="{{__url('__organization')}}" 
									class="btn btn-secondary btn-sm">
									{!! __mdi("close-thick") !!}
									{{__("words.close")}}
								</a>
								<button class="btn btn-primary btn-sm">
									{!! __mdi("plus-thick") !!}
									{{__("words.add")}}
								</button>
							</div>

						</form>

					</article>

					<article class="col-7">

						<table class="table">
							<thead>
								<th>{{__("words.rols")}}</th>
								<th class="actions">{{__("words.actions")}}</th>
							</thead>

							<tbody>
								@foreach( $rols as $rol )
								<tr>
									<td>
										<a href="{{__url('__entity/rols/'.$rol->id)}}"
											class="bt">
											<strong class="bt-title">
												{!! __mdi($rol->icon) !!}
												{{__("words.".$rol->slug)}}
											</strong>							

											<div class="bt-description">
												{{$rol->getMeta("description")}}
											</div>
										</a>
									</td>
									<td class="action">
										<div class="dropdown dropstart">			
											<a href="#" class="dropdown-toggle" 
												data-bs-toggle="dropdown">
												{!! __mdi("progress-wrench mdi-action") !!}
											</a>

											<div class="dropdown-menu headering">			

												<div class="dropdown-header">
													{!! __mdi("tools") !!}
													{{__("words.mantenance")}}
												</div>	
												<a href="{{__url('__entity/rol/'.$rol->id."/edit")}}" 
													class="dropdown-item">
													{{__("words.edit")}}
												</a>
												<a href="{{__url('__entity/rol/'.$rol->id."/delete")}}" 
													class="dropdown-item">
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

		</section>
	
	@endsection