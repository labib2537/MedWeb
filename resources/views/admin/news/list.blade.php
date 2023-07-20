<x-sg-master>
<!-- Basic datatable -->
<div class="card">
				
					<div class="card-header header-elements-inline">
						<h5 class="card-title">News List</h5>
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

					<table class="table datatable-basic">
						<thead>
							<tr>
                                <th>Serial No.</th>
								<th>News Name</th>
								<th>Headline</th>
								<th>Content</th>
                                <th>Post Date</th>
								<th>Alt Image</th>
								<th>Image</th>
                                <th>Status</th>
                              
								<th class="text-center">Actions</th>
							</tr>
						</thead>

						<tbody>
                        
                         @foreach($news as $key=>$news_info)
							<tr>
                           
								<td>{{++$key}}</td>
								<td>{{$news_info->name}}</td>
								<td>{{$news_info->heading}}</td>
								<td>{{$news_info->paragraph}}</td>
                                <td>{{$news_info->post_time}}</td>
								<td>{{$news_info->alt}}</td>
                                <td><img src="{{asset('uploads/images/news/'.$news_info->src)}}" style="width: 100px; height: 80px;"></td>
                        
								@if($news_info->is_active==1)
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
												
											<form action="{{route('news_show')}}" method="post">
                                                @csrf
												<input type="hidden" name="id" value="{{$news_info->id}}">
												<button class="dropdown-item" type="submit"><i class="icon-eye"></i>View</button>
						                        </form>

                                                <form action="{{ route('news_updateStatus') }}" method="post">
													@csrf
												<input type="hidden" name="id" value="{{$news_info->id}}">
												<input type="hidden" name="status" value="{{$news_info->is_active}}">
												@if($news_info->is_active==1)
												<button class="dropdown-item" type="submit"><i class="icon-unlocked"></i>Inactive</button>
								                @else
                                               	<button class="dropdown-item" type="submit"><i class="icon-lock4"></i>Active</button>
								                @endif
						                        </form>

												<form action="{{route('news_edit')}}" method="post">
                                                    @csrf
												<input type="hidden" name="id" value="{{$news_info->id}}">
												<button class="dropdown-item" type="submit"><i class="icon-pencil"></i>Edit</button>
						                        </form>
												
												<form action="{{route('news_delete')}}" method="post">
                                                    @csrf
												<input type="hidden" name="id" value="{{$news_info->id}}">
												<button class="dropdown-item" type="submit" onclick="return confirm('Are You Sure?')"><i class="icon-cross"></i>Delete</button>
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