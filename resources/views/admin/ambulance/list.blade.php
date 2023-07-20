<x-sg-master>
<div class="card">
				
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Ambulance Information</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

                    @if(Session::has('message'))
                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('message')}}</div>
                    @endif  

					<table class="table datatable-basic">
						<thead>
							<tr>
							    <th>Ambulance Number</th>
								<th>Driver Name</th>
								<th>Location</th>
								<th>Phone</th>
								<th>Status</th>
								
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							
						
							@foreach($ambulances as $ambu_info)
							<tr>
							    <td>{{$ambu_info->ambulance_number}}</td>	
								<td>{{$ambu_info->driver_name}}</td>
								<td>{{$ambu_info->location}}</td>
                                <td>{{$ambu_info->phone}}</td>	
                                @if($ambu_info->is_active==1)
								<td><span class="badge badge-success">Free</span></td>
                                @else
                                <td><span class="badge badge-danger">Busy</span></td>
                                @endif
             
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
											    
											    <form action="{{route('ambulance_updateStatus')}}" method="post">
                                                    @csrf
												<input type="hidden" name="id" value="{{$ambu_info->id}}">
                                                <input type="hidden" name="status" value="{{$ambu_info->is_active}}">
												<button class="dropdown-item" type="submit"><i class="icon-database-refresh"></i>Update Status</button>
						                        </form>
											
												<form action="{{route('ambulance_edit')}}" method="post">
                                                    @csrf
												<input type="hidden" name="id" value="{{$ambu_info->id}}">
												<button class="dropdown-item" type="submit"><i class="icon-pencil"></i>Edit</button>
						                        </form>
												
												<form action="{{route('ambulance_delete')}}" method="post">
                                                    @csrf
												<input type="hidden" name="id"  value="{{$ambu_info->id}}">
												<button class="dropdown-item" type="submit" onclick="return confirm('Are you sure?')"><i class="icon-cross"></i>Delete</button>
						                        </form>
											</div>
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