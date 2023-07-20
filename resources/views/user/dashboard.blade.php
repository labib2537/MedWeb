
@php
use Carbon\Carbon;

$appoints = App\Models\Appointment::where('user_id', auth()->user()->id )
                                  ->whereDate('date', '>=', Carbon::today()->toDateString())
                                  ->Where('is_active', 1)
                                  ->orderBy('date', 'desc')
                                  ->get();

$tests = App\Models\MedicalTestAppointment::where('user_id', auth()->user()->id )
                                  ->whereDate('date', '>=', Carbon::today()->toDateString())
                                  ->orderBy('date', 'desc')
                                  ->get();
								  

$startDate = Carbon::now()->subMonths(3)->startOfMonth();
$endDate = Carbon::now()->endOfMonth();

$news = App\Models\News::whereBetween('post_time', [$startDate, $endDate])
             ->Where('is_active', 1)
             ->orderBy('post_time', 'desc')
             ->get();



@endphp

<x-sg-usermaster>
@if(Session::has('message'))
                    <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('message')}}</div>
                    @endif  
    <h3>Dashboard</h3>
    

	<!-- show upcomming appointment -->
     
    <div class="card">
							

							<div class="card-body bg-indigo-300 pb-0 pt-2">
                              <div class="text-center">
                                <h6>My Upcoming Appointment</h6>
                              </div>
							</div>

							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
                                        
										<tr>
                                        <th>#</th>
											<th class="w-50">Doctor Name</th>
                                            <th>Appointed as</th>
											<th>Time</th>
											<th>Date</th>
                                            
										</tr>
									</thead>
									<tbody>
                                    @if(count($appoints)>0)    
                                    @foreach($appoints as $key=>$app)
										<tr>
                                            <td>{{++$key}}</td>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														
                                                        <img class="img-fluid rounded-circle" src="{{asset('uploads/images/doctors/'.$app->doctor->image)}}"
                    width="50" height="50" alt="">
														
													</div>
													<div>
                                                    <form id="doctorForm" action="{{ route('doctor_show_user', ['id' => $app->doctor->id]) }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title" onclick="event.preventDefault(); document.getElementById('doctorForm').submit();">{{$app->doctor_name}}</a>
														<div class="text-muted font-size-sm">{{$app->specialist}}</div>
													</div>
												</div>
											</td>
                                            <td>
												<p class="font-size-md mb-0">{{$app->patient_name}} </p>
											</td>
											<td>
												<span class=" font-size-sm">{{\Carbon\Carbon::parse($app->time)->format('h:i A')}}</span>
											</td>
											<td>
												<h6 class="font-size-md mb-0">{{date("l", strtotime($app->date))}}, &nbsp{{$app->date}} </h6>
											</td>
                                           
										</tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">No upcoming appointments available</td>
                                    </tr>
							
                                    @endif
									</tbody>
								</table>
							</div>
						</div>
<!-- end appointment -->

<!-- show upcomming medical test -->
     
<div class="card">
							

							<div class="card-body bg-success-400 pb-0 pt-2">
                              <div class="text-center">
                                <h6>My Upcoming Medical Test</h6>
                              </div>
							</div>

							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
                                        
										<tr>
                                        <th>#</th>
											<th class="w-50">Test Name</th>
                                            <th>Appointed as</th>
											<th>Cost</th>
											<th>Date</th>
                                            
										</tr>
									</thead>
									<tbody>
                                    @if(count($tests)>0)    
                                    @foreach($tests as $key=>$test)
										<tr>
                                            <td>{{++$key}}</td>
											<td>
									
                                                    <a href="{{route('medical_appointment_show')}}" class="text-default font-weight-semibold letter-icon-title">{{$test->test_name}}</a>
														<div class="text-muted font-size-sm">{{$test->type}}</div>
													</div>
												</div>
											</td>
                                            <td>
												<p class="font-size-md mb-0">{{$test->patient_name}} </p>
											</td>
											<td>
												<span class=" font-size-sm">{{$test->cost}}</span>
											</td>
											<td>
												<h6 class="font-size-md mb-0">{{date("l", strtotime($test->date))}}, &nbsp{{$test->date}} </h6>
											</td>
                                           
										</tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">No upcoming medical test available</td>
                                    </tr>
							
                                    @endif
									</tbody>
								</table>
							</div>
						</div>
<!-- end appointment -->


<!-- news -->

<h5 class="mt-4 mb-3">Recent News & Blogs</h5>

@if(count($news)>0) 
<div class="row">
@foreach($news as $anews)
	<div class="col-3">

	

	<div class="card">
							<div class="card-img-actions mx-1 mt-1">
								<img class="card-img img-fluid" src="{{ asset('uploads/images/news/'.$anews->src) }}" style="height: 25vh;" alt="">
								<div class="card-img-actions-overlay card-img">
								<div class="text-center">
                                <h6>{{$anews->heading}}</h6>
                              </div>
								</div>
							</div>

							<div class="card-body text-center">
								<h6 class="font-weight-semibold">{{$anews->heading}}</h6>
								<p class="text-muted">{{Carbon::createFromFormat('Y-m-d', $anews->post_time)->format('d F Y')}}</p>
								@if(str_word_count($anews->paragraph) > 15)
								<p>{{ implode(' ', array_slice(explode(' ', $anews->paragraph), 0, 15)) }}...</p>
								<a type="button" class="btn btn-light legitRipple" data-toggle="modal" data-target="#{{$anews->uuid}}"><i class="icon-arrow-right8 mr-2"></i> Read more</a>
								@else
								<p>{{$anews->paragraph}}</p>
								@endif
								
							</div>
							 <!-- Basic modal -->
				<div id="{{$anews->uuid}}" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">{{$anews->heading}}</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								
							<img class="card-img img-fluid" src="{{ asset('uploads/images/news/'.$anews->src) }}" style="height: 30vh;" alt="">
								<h6 class="font-weight-semibold mt-3">{{$anews->heading}}</h6>
								<p class="text-muted">{{Carbon::createFromFormat('Y-m-d', $anews->post_time)->format('d F Y')}}</p>
								<p>{{$anews->paragraph}}</p>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /basic modal -->
						</div>
						
	</div>
	@endforeach
</div>
@else
<div class="card-body bg-light pb-2">
                              <div class="text-center">
                                <h6>There is no recent news and blogs available</h6>
                              </div>
							</div>
@endif



<!-- end -->

</x-sg-usermaster>