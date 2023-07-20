<x-sg-master>
    		<!-- All runtimes -->
            <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Add Ambulance</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">

						<form action="{{route('ambulance_update')}}" method="post">
                            @csrf
							<fieldset>
                            <input name="id" type="hidden" class="form-control" value="{{$ambu->id}}" required>
								

								<div class="form-group">
									<label>Driver Name:</label>
									<input name="name" type="text" class="form-control" placeholder="Name" value="{{$ambu->driver_name}}" required>
								</div>

								<div class="form-group">
									<label>Ambulance Number:</label>
									<input name="number" type="text" class="form-control" placeholder="Ambulance No." value="{{$ambu->ambulance_number}}" required>
								</div>

								<div class="form-group">
									<label>Location:</label>
									<input name="location" type="text" class="form-control" placeholder="Location" value="{{$ambu->location}}" required>
								</div>

								<div class="form-group">
									<label>Phone number:</label>
									<input name="phone" type="text" class="form-control" placeholder="Phone Number" value="{{$ambu->phone}}" required>
								</div>

							
							</fieldset>


							<div class="text-center mt-2">
								<button type="submit" class="btn btn-primary">Save<i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
						

						
					</div>
				</div>
				<!-- /all runtimes -->
</x-sg-master>    