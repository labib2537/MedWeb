<x-sg-master>
<!-- add new patient -->

<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Add New Test</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">

						<form action="{{route('medical_test_insert')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<fieldset>
								<div class="form-group">
									<label>Test Type:</label>
									<input name="type" type="text" class="form-control" placeholder="Test Type" required>
								</div>

								<div class="form-group">
									<label>Test Name:</label>
									<input name="name" type="text" class="form-control" placeholder="Test Name" required>
								</div>

								<div class="form-group">
									<label>Test Cost:</label>
									<input name="cost" type="text" class="form-control" placeholder="EX : 800 TK" required>
								</div>

								<div class="form-group">
									<label>Test Place:</label>
									<input name="place" type="text" class="form-control" placeholder="EX : 3rd Floor" required>
								</div>

								<div class="form-group">
									<label>Test Time:</label>
									<input name="time" type="text" class="form-control" placeholder="EX : 3:00pm - 10:00pm" required>
								</div>

								<!-- file uploader -->

								<div class="form-group">
								<label>Upload Image:</label>
								<input name="image" type="file" class="file-input" data-fouc>
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