<x-sg-master>
    <!-- Basic datatable -->
				
			<div class="card">
				
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Sliders List</h5>
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
					<div class="text-left ml-2">
						<form action="{{route('slider_list')}}" method="GET">
							@csrf
							<button type="submit" class="btn btn-success btn-labeled btn-labeled-left btn-sm legitRipple"><b><i class="icon-home"></i></b> Back</button>
						</form>
					</div>
					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Heading</th>
								<th>Image</th>
								<th>Alter Name</th>
								<th>Status</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							
							@foreach($sliders as $slider)
							<tr>
								<td>{{$slider->id}}</td>
								<td>{{$slider->name}}</td>
								<td>{{$slider->heading}}</td>
								<td><img src="{{asset('uploads/images/sliders')}}/{{$slider->src}}" style="width: 100px; height: 80px;"></td>	
								<td>{{$slider->alt}}</td>
								@if($slider->is_active==1)
									<td><span class="badge badge-success">Active</span></td>
								@else
                                     <td><span class="badge badge-secondary">Inactive</span></td>
								@endif
								
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
                                                <form action="{{ route('slider_restore') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$slider->id}}">
                                                    <button class="dropdown-item" type="submit"><i class="icon-eye"></i> Restore</button>
                                                </form>
                                                <form action="{{ route('slider_permanent_delete') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$slider->id}}">
                                                    <button class="dropdown-item" type="submit"><i class="icon-trash"></i> Delete Permanently</button>
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