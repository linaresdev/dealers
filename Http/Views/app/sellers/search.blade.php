	
				
				@foreach( $dealers as $dealer)
					<tr>
						<td class="ps-2">
							<a href="{{__url('seller/entity/'.$dealer->id)}}" 
								class="bt">
								<img src="{{__url($dealer->getMeta("logo"))}}" 
									alt="@"
									class="avatar avatar-circle my-1"					
									style="width: 36px; height: 36px;">
								{{$dealer->group}}
							</a>
						</td>

						<td>{{$dealer->getMeta("phone")}}</td>
						<td>{{$dealer->getMeta("email")}}</td>

						<td class="action">

							<div class="dropdown dropstart">

								<a href="#" class="dropdown-toggle" 
									data-bs-toggle="dropdown">
									{!! __mdi("progress-wrench mdi-action") !!}
								</a>

								<div class="dropdown-menu headering">
									<div class="dropdown-header">
										{!! __mdi("storefront-outline") !!}
										{{$dealer->group}}
									</div>
									<a href="{{__url('seller/update/'.$dealer->id)}}" 
										class="dropdown-item">
										{{__("account.update")}}
									</a>
									<a href="{{__url('seller/update/'.$dealer->id.'/logo')}}" class="dropdown-item">
										{{__("update.logo")}}
									</a>

									<div class="dropdown-header">
										{!! __mdi("cog") !!}
										{{__("words.manager")}}
									</div>
									<a href="{{__url('seller/'.$dealer->id.'/users')}}" class="dropdown-item">
										{{__("words.users")}}
									</a>
								</div>
							</div>

						</td>
					</tr>
				@endforeach