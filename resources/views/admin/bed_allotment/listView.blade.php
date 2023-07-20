<x-sg-master>
<a href="{{route('bed_list')}}" class="btn btn-outline alpha-success text-success-800 border-success-600 legitRipple mb-3">Grid View</a>
<div class="card">
				
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Cabin List</h5>
                    
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
                        <th>Cabin Serial</th>
                            <th>Cabin Number</th>
                            <th>Cabin Type</th>
                           
                            <th>Status</th>
                            <th>Status Changed at</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($beds as $key=>$bed)
                        <tr>
                        <td>{{++$key}}</td>
                            <td>{{$bed->cabin_number}}</td>
                            

                            @if($bed->cabin_type=='Single Bed')
                                <td><span class="badge badge-flat badge-pill border-primary text-primary-600">{{$bed->cabin_type}} </span></td> 
                                
                            @else
                            <td><span class="badge badge-flat badge-pill border-success text-success-600">{{$bed->cabin_type}} </span></td> 
                            @endif


                        
                            @if($bed->is_active==1)
                                <td><span class="badge badge-success">Admitted</span></td>
                            @else
                                 <td><span class="badge badge-secondary">Empty</span></td>
                            @endif
                            <td>{{$bed->change_status_at}}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <form action="bed_management_book.php" method="post">
                                                @csrf
                                            <input type="hidden" name="id" value="{{$bed->id}}">
                                            <input type="hidden" name="status" value="{{$bed->is_active}}">
                                            @if($bed->is_active==0)
                                               <button class="dropdown-item" type="submit"><i class="icon-calendar3"></i>Book Cabin</button>
                                            @else
                                            <button disabled class="dropdown-item" type="submit"><i class="icon-calendar3"></i>Book Cabin</button>
                                            @endif
                                            </form>
                                            
                                            <form action="{{route('bed_edit')}}" method="get">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$bed->id}}">
                                                <button class="dropdown-item" type="submit"><i class="icon-pencil"></i> Edit</button>
                                            </form>
                                            <form action="{{route('bed_delete')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$bed->id}}">
                                                <button class="dropdown-item" type="submit" onclick="return confirm('Are you sure?')"><i class="icon-cross"></i> Delete</button>
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
</x-sg-master>    