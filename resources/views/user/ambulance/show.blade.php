
@php
    use Carbon\Carbon;
@endphp
<x-sg-usermaster>
<div class="mb-3 pt-2">
				<h4 class="mb-3 font-weight-semibold">
					My Ambulance
				</h4>
				@if(Session::has('message'))
                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('message')}}</div>
                    @endif  

                @foreach($requests as $request)
                
                <div class="card card-body" bis_skin_checked="1">
							<div class="media" bis_skin_checked="1">
								<div class="media-body" bis_skin_checked="1">
									<h5 class="media-title text-danger font-weight-semibold mb-3">Your Ambulance Status!</h5>
									<p class="text-dark">You have requested for an ambulance
									<h6>Requested as: &nbsp;
									<span class="media-title text-dark font-weight-semibold">{{$request->name}}</span></h6></span></h6>
                                    </p>
                                    
									@if($request->is_active==1 && $request->is_reject==0)
                                    <h6>Requested at: &nbsp;
                                    
									<span class="media-title text-danger font-weight-semibold">{{ Carbon::parse($request->created_at)->tz('Asia/Dhaka')->format('d-m-Y \a\t h:i:s A') }}</span></h6>
									<h6 class="text-dark">In few minutes ambulance will be in your address
                                        <span class="media-title text-danger font-weight-semibold">({{ $request->address }})</span>.</h6>
                                    @elseif($request->is_active==0 && $request->is_reject==1)
                                    <h6>Ambulance Status: &nbsp;
									<span class="badge badge-danger"> Rejected</span></h6>
                                    <h6>
                                    <span class="media-title text-danger font-weight-semibold">Sorry, all our ambulances are currently occupied. We apologize for any inconvenience caused.</span>.</h6>
									
									@else
									<h6>Ambulance Status: &nbsp;
									<span class="badge badge-secondary"> Pending</span></h6>
                                    <form action="{{route('ambulance_cancel')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$request->id}}"> 
												<button type="submit" name="submit" class="btn btn-danger btn-sm mt-3" onclick="return confirm('Are you sure?')">Cancel Appointemnt</button>
											</form>
									@endif

									

								</div>

								<div class="ml-3 align-self-center" bis_skin_checked="1">
									<i class="icon-truck icon-2x text-danger-300"></i>
								</div>
							</div>
						</div>
                        @endforeach
			</div>
           
</x-sg-usermaster>    