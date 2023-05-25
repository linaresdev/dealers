
					@foreach( $warranties as $warranty )
						<tr>
							<td class="py-1 px-2">
								<a href="{{__url('__warranty/show/'.$warranty->id)}}" 
											class="dropdown-item">
									{{$warranty->niv}}
								</a>
							</td>
							<td>{{$warranty->customer}}</td>
							<td class="uplink-{{$warranty->state}} py-1 center">
								@if( $warranty->state == 0 )
								{!! __mdi("pause-circle-outline mdi-18px") !!}
								@elseif( $warranty->state == 1 )
								{!! __mdi("satellite-uplink mdi-18px") !!}
								@elseif( $warranty->state == 2 )
								{!! __mdi("check mdi-18px") !!}
								@elseif( $warranty->state == 3 )
								{!! __mdi("bell-alert-outline mdi-18px") !!}
								@endif
								<span class="toggled-sm">
									{{__("seller.state.$warranty->state")}}
								</span>
							</td>
							<td class="action">
								<div class="dropdown dropstart">
									<a href="#" class="dropdown-toggle" 
										data-bs-toggle="dropdown">
										{!! __mdi("progress-wrench mdi-action") !!}
									</a>

									<div class="dropdown-menu">
										<a href="{{__url('__warranty/show/'.$warranty->id)}}" 
											class="dropdown-item">
											{{__("words.information")}}
										</a>
										@if(($warranty->state == 0) OR ($warranty->state == 3))
										<a href="{{__url('__warranty/activate/'.$warranty->id)}}" 
											class="dropdown-item">
											{{__("words.activate")}}
										</a>
										<a href="{{__url('__warranty/delete/'.$warranty->id)}}" class="dropdown-item">
											{{__("words.delete")}}
										</a>
										@endif
									</div>
								</div>
							</td>
						</tr>
						@endforeach