<x-sg-master>
    <!-- add new patient -->

<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Edit News information</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
					
						<form action="{{route('news_update')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<fieldset>
								
                            <input type="hidden" name="id" class="form-control"
                                value="{{$edit->id}}">
                                <input type="hidden" name="uuid" class="form-control"
                                    value="{{$edit->uuid}}">

								<div class="form-group">
									<label>News Name:</label>
									<input name="title" type="text" class="form-control" placeholder="Name" value="{{$edit->name}}" required>
								</div>

								<div class="form-group">
									<label>News Headline:</label>
									<input name="head" type="text" class="form-control" placeholder="Headline" value="{{$edit->heading}}" required>
								</div>

								<div class="form-group">
									<label>News Content:</label>
									<input name="content" type="text" class="form-control" placeholder="Content" value="{{$edit->paragraph}}" required>
								</div>

								<div class="form-group">
									<label>Post Date:</label>
									<input id="date" name="date" type="date" class="form-control" value="{{$edit->post_time}}" required>
								</div>

								<div class="form-group">
                            <label>Upload Image:</label>	
                            <input name="newimage" type="file" class="file-input">
                            <img src="{{asset('uploads/images/news')}}/{{$edit->src}}" style="width:100px;height:100px">
                            <input name="oldimage" type="hidden" class="form-control" value="{{$edit->src}}">
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