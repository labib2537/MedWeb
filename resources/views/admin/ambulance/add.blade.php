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

						<form action="{{route('ambulance_insert')}}" method="post">
                            @csrf
							<fieldset>
								
								

								<div class="form-group">
									<label>Driver Name:</label>
									<input name="name" type="text" class="form-control" placeholder="Name" required>
								</div>

								<div class="form-group">
									<label>Ambulance Number:</label>
									<input name="number" type="text" class="form-control" placeholder="Ambulance No." required>
								</div>

								<div class="form-group">
									<label>Location:</label>
									<input name="location" type="text" class="form-control" placeholder="Location" required>
								</div>

								<div class="form-group">
									<label>Phone number:</label>
									<input name="phone" type="text" class="form-control" placeholder="Phone Number" required>
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