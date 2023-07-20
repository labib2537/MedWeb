@php
    use Carbon\Carbon;
@endphp

<x-sg-master>
<!-- Basic datatable -->
<div class="card">
			
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Ambulance Request</h5>
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
								<th>Address</th>
								<th>Phone</th>
								<th>Message</th>
                                <th>Sent Time</th>
								<th>Status</th>
								
								
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($requests as $ambu_req)
							<tr>
								<td>{{$ambu_req->name}}</td>
								<td>{{$ambu_req->address}}</td>
								<td>{{$ambu_req->phone}}</td>
								<td>{{$ambu_req->message}}</td>		
                                <td>{{ Carbon::parse($ambu_req->created_at)->tz('Asia/Dhaka')->format('d-m-Y \a\t h:i:s A') }}</td>	
                                @if($ambu_req->is_active==1 && $ambu_req->is_reject==0)
								<td><span class="badge badge-success">Assigned</span></td>
                                @elseif($ambu_req->is_active==0 && $ambu_req->is_reject==1)
                                <td><span class="badge badge-danger">Rejected</span></td>
                                @else
                                <td><span class="badge badge-secondary">Pending</span></td>
                                @endif
             
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
                                            @if($ambu_req->is_active==0 && $ambu_req->is_reject==0)
											<div class="dropdown-menu dropdown-menu-right">

										    

												<form action="{{route('ambulance_accept')}}" method="post">
                                                    @csrf
												<input type="hidden" name="id" value="{{$ambu_req->id}}">
												<input type="hidden" name="status" value="{{$ambu_req->is_active}}">
										
												<button class="dropdown-item" type="submit"><i class="icon-checkmark"></i>Accecpt Request</button>
						                        </form>
                                                <form action="{{route('ambulance_reject')}}" method="post">
                                                    @csrf
												<input type="hidden" name="id" value="{{$ambu_req->id}}">
												<input type="hidden" name="status" value="{{$ambu_req->is_reject}}">
										
												<button class="dropdown-item" type="submit" onclick="return confirm('Are you sure?')"><i class="icon-cross2" ></i>Reject Request</button>
						                        </form>
											
												
												
											</div>
                                            @endif
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->

</x-sg-master>