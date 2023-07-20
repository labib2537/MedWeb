<x-sg-master>
    <!-- add new patient -->

    <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Edit Patient Information</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">

					

						<form action="{{route('patient_update')}}" method="post">
							@csrf
							<fieldset>
								
                            <input name="id" type="hidden" value="{{$editData->id}}" required>
							<input name="uuid" type="hidden" value="{{$editData->uuid}}" required>
                            <input type="hidden" name="status" value="{{$editData->status}}">
							<input type="hidden" name="color" value="{{$editData->status_color}}">

								<div class="form-group">
									<label>Patient Name:</label>
									<input name="name" type="text" class="form-control" placeholder="Name" value="{{$editData->patient_name}}" required>
								</div>

								<div class="form-group">
									<label>Age:</label>
									<input name="age" type="text" class="form-control" placeholder="Age" value="{{$editData->age}}" required>
								</div>

								<div class="form-group">
									<label>Address:</label>
									<input name="address" type="text" class="form-control" placeholder="Address" value="{{$editData->address}}" required>
								</div>

								<div class="form-group">
									<label>Phone number:</label>
									<input name="phone" type="text" class="form-control" placeholder="Phone Number" value="{{$editData->phone}}" required>
								</div>

								<div class="form-group">
									<label>Time and Date:</label>
									<input name="date" type="text" class="form-control" placeholder="Time and Date" value="{{$editData->date}}" required>
								</div>

                                <div class="form-group">
									<label>Room Number:</label>
									<input name="room" type="text" class="form-control" placeholder="Room Number" value="{{$editData->room}}" required>
								</div>

                                <div class="form-group">
									<label>Total Amount:</label>
									<input name="bill" type="text" class="form-control" placeholder="Bill Amount" value="{{$editData->bill}}" required>
								</div>

								<div class="form-group">
									<label>Paid Amount:</label>
									<input name="paid" type="text" class="form-control" placeholder="Paid Amount" value="{{$editData->paid_bill}}" required>
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