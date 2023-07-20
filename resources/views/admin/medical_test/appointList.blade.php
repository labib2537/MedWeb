<x-sg-master>
    <!-- Basic datatable -->
    <div class="card">
    @if(Session::has('message'))
                    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>{{Session::get('message')}}</div>
                    @endif  
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Medical Appointemnt List</h5>
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
								<th>Test Name</th>
                                <th>Test Type</th>
                                <th>Cost</th>
                                <th>Phone</th>
								<th>Gender</th>
								<th>Address</th>
								<th>Appointemnt Date</th>
								
								
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($Medappoints as $req)
                     
							<tr>
								<td>{{$req->patient_name}}</td>
                                <td>{{$req->test_name}}</td>
                                <td>{{$req->type}}</td>
                                <td>{{$req->cost}}</td>	
                                <td>{{$req->phone}}</td>	
								<td>{{$req->gender}}</td>
								<td>{{$req->city}}, {{$req->state}}, {{$req->zip}}</td>
                                <td>{{$req->date}}</td>	
							
             
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
           
							@endforeach
			
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
</x-sg-master>    