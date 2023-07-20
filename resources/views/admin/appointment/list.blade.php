<x-sg-master>
    <!-- Basic datatable -->
    <div class="card">
    @if(Session::has('message'))
                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('message')}}</div>
                    @endif  
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Appointemnt List</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>Patient Name</th>
								<th>Doctor Name</th>
                                <th>Specialist</th>
								<th>Gender</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Appointemnt Date</th>
								<th>Appointemnt Time</th>
								
								
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($appoints as $req)
                            @if($req->is_active==1)
							<tr>
								<td>{{$req->patient_name}}</td>
                                <td>{{$req->doctor_name}}</td>
                                <td>{{$req->specialist}}</td>
								<td>{{$req->gender}}</td>
								<td>{{$req->city}}, {{$req->state}}, {{$req->zip}}</td>
								
                                <td>{{$req->phone}}</td>	
								<td>{{$req->date}}</td>	
								<td>{{\Carbon\Carbon::parse($req->time)->format('h:i A')}}</td>
							
             
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">

											
											<form action="{{route('appointment_edit')}}" method="post">
                                                @csrf
												<input type="hidden" name="id" value="{{$req->id}}">
									
												<button class="dropdown-item" type="submit"><i class="icon-pencil"></i> Edit</button>
						                        </form>
											</div>
										</div>
									</div>
								</td>
							</tr>
                            @endif
							@endforeach
			
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
</x-sg-master>    