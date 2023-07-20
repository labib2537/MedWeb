<x-sg-master>
    <!-- Basic datatable -->
				
			<div class="card">
				
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Patient List</h5>
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
								<th>Patient Name</th>
								<th>Age</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Admitted at</th>
								<th>Room Number</th>
								<th>Total Amount</th>
								<th>Paid Amount</th>
								<th>Due Amount</th>
								<th>Status</th>
								
								
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($patients as $patient)
							<tr>
								<td>{{$patient->patient_name}}</td>
								<td>{{$patient->age}}</td>
								<td>{{$patient->address}}</td>
								<td>{{$patient->phone}}</td>
								<td>{{$patient->date}}</td>	
								<td>{{$patient->room}}</td>
								<td>{{$patient->bill}}/-</td>
								<td>{{$patient->paid_bill}}/-</td>
								<td>{{$patient->due_bill}}/-</td>
								<td><span class="badge {{$patient->status_color}}">{{$patient->status}}</span></td>
             
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">

											
                                             @if($patient->status=='Admitted')												

												<form action="{{route('patient_updateStatus')}}" method="post">
													@csrf
												<input type="hidden" name="id" value="{{$patient->id}}">
			
												<button class="dropdown-item" type="submit"><i class="icon-database-refresh"></i>Discharged</button>
						                        </form>
											 @endif
											

												<a href="invoice.php" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
												

												<form action="{{route('patient_edit')}}" method="get">
													@csrf
												<input type="hidden" name="id" value="{{$patient->id}}">
												<input type="hidden" name="uuid" value="{{$patient->uuid}}">
												<input type="hidden" name="status" value="{{$patient->status}}">
												<input type="hidden" name="color" value="{{$patient->status_color}}">
												<button class="dropdown-item" type="submit"><i class="icon-pencil"></i> Edit</button>
						                        </form>
												
                                                
												<form action="{{route('patient_delete')}}" method="get">
												@csrf
												<input type="hidden" name="id" value="{{$patient->id}}">
												<button class="dropdown-item" type="submit" onclick="return confirm('Are you sure?')"><i class="icon-cross"></i> Delete</button>
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