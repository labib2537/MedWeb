<x-sg-master>
<!-- add new patient -->
<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Edit Test Name Information</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
                    

						<form action="{{route('medical_test_update')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<fieldset>

                            
									<input type="hidden" name="id" class="form-control"
                                    value="{{$editdata->id}}">

								<div class="form-group">
									<label>Test Type:</label>
									<input name="type" type="text" class="form-control" placeholder="Name" 
                                    value="{{$editdata->type}}" required>
								</div>
							
								<div class="form-group">
									<label>Test Name:</label>
									<input name="name" type="text" class="form-control" placeholder="Name" 
                                    value="{{$editdata->name}}" required>
								</div>
                                
								

								<div class="form-group">
									<label>Test Cost:</label>
									<input name="cost" type="text" class="form-control" placeholder="Heading"
                                    value="{{$editdata->cost}}" required>
								</div>

								<div class="form-group">
									<label>Test Time:</label>
									<input name="time" type="text" class="form-control" placeholder="paragraph" value="{{$editdata->time}}" required>
								</div>

								<div class="form-group">
									<label>Test Place:</label>
									<input name="place" type="text" class="form-control" placeholder="Alt Name"
                                    value="{{$editdata->place}}" required>
								</div>

								
								<div class="form-group">
								<label>Upload Image:</label>	
								
								
								<input name="newimage" type="file" class="file-input">
                                <img src="{{asset('uploads/images/medical_tests/'.$editdata->image)}}"
                                        style="width:100px;height:100px">
								<input name="oldimage" type="text" class="form-control" value="{{$editdata->image}}">
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