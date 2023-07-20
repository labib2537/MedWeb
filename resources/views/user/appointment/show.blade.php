<x-sg-usermaster>
<div class="mb-3 pt-2">
				<h4 class="mb-3 font-weight-semibold">
					My Appointemnt
				</h4>
				@if(Session::has('message'))
                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('message')}}</div>
                    @endif  

                @foreach($appoints as $appoint)
                
                <div class="card card-body" bis_skin_checked="1">
							<div class="media" bis_skin_checked="1">
								<div class="media-body" bis_skin_checked="1">
									<h5 class="media-title text-indigo font-weight-semibold mb-3">You have an appointment!</h5>
									<p class="text-dark">You have an appointment with 
									<h6>Appoinmented as: &nbsp;
									<span class="media-title text-dark font-weight-semibold">{{$appoint->patient_name}}</span></h6></span></h6>
                                    <form action="{{route('doctor_show_user')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$appoint->doctor_id}}">
												<h6>Doctor Name: <button type="submit" name="submit" class="btn btn-no-border bg-white">{{$appoint->doctor_name}}</button></h6>
											</form>
                                    </p>
                                    
									@if($appoint->is_active==0)	
									<h6>Appoinment Status: &nbsp;
									<span class="badge badge-secondary"> Pending</span></h6>
									@else
									<h6>Appoinment Date: &nbsp;
									<span class="media-title text-indigo font-weight-semibold">{{date("l", strtotime($appoint->date))}}, &nbsp{{$appoint->date}} </span></h6>
									<h6>Appoinment Time: &nbsp;
									<span class="media-title text-indigo font-weight-semibold">{{\Carbon\Carbon::parse($appoint->time)->format('h:i A')}}</span></h6>
									@endif

									<form action="{{route('appointment_cancel')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$appoint->id}}"> 
												<button type="submit" name="submit" class="btn btn-danger btn-sm mt-3" onclick="return confirm('Are you sure?')"><i class="icon-cross mr-1"></i>Cancel Appointemnt</button>
											</form>

								</div>

								<div class="ml-3 align-self-center" bis_skin_checked="1">
									<i class="icon-calendar3 icon-2x text-indigo-300"></i>
								</div>
							</div>
						</div>
                        @endforeach
			</div>
           
</x-sg-usermaster>    