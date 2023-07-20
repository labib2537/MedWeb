<x-sg-master>

<div class="card">
				
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Bed Allotment List</h5>
                    
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
                        <th>Patient Name</th>
                        <th>Cabin Number</th>
                        <th>Cabin Type</th>
                        <th>Age</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($beds as $bed)
                        <tr>
                        <td>{{$bed->patient_name}}</td>
                        <td>{{$bed->room}}</td>
                        <td>{{$bed->cabin->cabin_type}}</td>
                        <td>{{$bed->age}}</td>
                        <td>{{$bed->phone}}</td>
                        <td>{{$bed->address}}</td>
                        <td>{{$bed->date}}</td>


                        
                            @if($bed->cabin->is_active==1  && $bed->is_discharged==0)
                                <td><span class="badge badge-success">Admitted</span></td>
                            @else
                                 <td><span class="badge badge-secondary">Discharged</span></td>
                            @endif
                            
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        @if($bed->cabin->is_active==1 && $bed->is_discharged==0)
                                        <div class="dropdown-menu dropdown-menu-right">

                                            
                                           
                                            <form action="{{route('bed_discharged')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="p_id" value="{{$bed->id}}">
                                            <input type="hidden" name="id" value="{{$bed->cabin->id}}">
                                            <input type="hidden" name="status" value="{{$bed->cabin->is_active}}">
                                               <button class="dropdown-item" type="submit"><i class="icon-exit"></i>Discharged</button>
                                               </form>
                                               <form action="{{route('bed_patient_edit')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$bed->id}}">
                                                <button class="dropdown-item" type="submit"><i class="icon-pencil"></i> Edit</button>
                                            </form>
                                           
                                            
                                            
                                            
                                           
                                            
                                            
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </td>	
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
</x-sg-master>    