<x-sg-master>
    <!-- add new patient -->

    <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Add New Patient</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">

					

						<form action="{{route('patient_insert')}}" method="post">
							@csrf
							<fieldset>
								
								

								<div class="form-group">
									<label>Patient Name:</label>
									<input name="name" type="text" class="form-control" placeholder="Name" required>
								</div>

								<div class="form-group">
									<label>Age:</label>
									<input name="age" type="text" class="form-control" placeholder="Age" required>
								</div>

								<div class="form-group">
									<label>Address:</label>
									<input name="address" type="text" class="form-control" placeholder="Address" required>
								</div>

								<div class="form-group">
									<label>Phone number:</label>
									<input name="phone" type="text" class="form-control" placeholder="Phone Number" required>
								</div>

								<div class="form-group">
									<label>Time and Date:</label>
									<input name="date" type="text" class="form-control" placeholder="Time and Date" required>
								</div>

                                <div class="form-group">
									<label>Room Number:</label>
									<input name="room" type="text" class="form-control" placeholder="Room Number" required>
								</div>

							
							</fieldset>


							<div class="text-center mt-2">
								<button type="submit" class="btn btn-primary">Save<i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
						

						
					</div>
				</div>
            
            

            <!-- add new patient end -->

</x-sg-master>