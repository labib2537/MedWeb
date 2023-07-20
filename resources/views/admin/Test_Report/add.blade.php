<x-sg-master>
<!-- All runtimes -->
<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Upload Test Report</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">

						<form action="{{route('testReport_insert')}}" method="post" enctype="multipart/form-data">
						@csrf
							<fieldset>
							   <input type="hidden" name="id" value="{{$report->id}}">

								<div class="form-group">
									<label>Upload Test Report File:</label>
									<input name="pdf" type="file" class="file-input" required>
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