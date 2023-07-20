<x-sg-master>
<!-- add new patient -->

<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Add New News</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
					
						<form action="{{route('news_insert')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<fieldset>
								
							

								<div class="form-group">
									<label>News Name:</label>
									<input name="title" type="text" class="form-control" placeholder="Name" required>
								</div>

								<div class="form-group">
									<label>News Headline:</label>
									<input name="head" type="text" class="form-control" placeholder="Headline" required>
								</div>

								<div class="form-group">
									<label>News Content:</label>
									<input name="content" type="text" class="form-control" placeholder="Content" required>
								</div>

                                <div class="form-group">
									<label>Post Date:</label>
									<input id="date" name="date" type="date" class="form-control" required>
								</div>


								<div class="form-group">
									<label>Upload Image:</label>
									<input name="src" type="file" class="file-input" required>
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