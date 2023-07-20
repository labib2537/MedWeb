<x-sg-master>
    <!-- Basic datatable -->
    <div class="card">
       
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Test Report Lists</h5>
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
                        <th>Test Name</th>
                        <th>Test Type</th>
                        <th>Test Cost</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Time and Date</th>
                        <th>File</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($reports as $test){ ?>
                    <tr>
                        <td>{{$test->patient_name}}</td>
                        <td>{{$test->test_name}}</td>
                        <td>{{$test->type}}</td>
                        <td>{{$test->cost}}</td>
                        <td>{{$test->city}}, {{$test->state}}, {{$test->zip}}</td>
                        <td>{{$test->phone}}</td>
                        <td>{{$test->date}}</td>
                        <td>{{$test->report_file}}</td>
     
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($test->report_file==null)

                                    <form action="{{route('testReport_add')}}" method="post">
                                            @csrf
                                        <input type="hidden" name="id" value="{{$test->id}}">
                                        <button class="dropdown-item" type="submit"><i class="icon-upload"></i>Upload Report</button>
                                        </form>
                                        @else

                                        <form action="{{route('testReport_show')}}" method="post">
                                            @csrf
                                        <input type="hidden" name="id" value="{{$test->id}}">
                                        <button class="dropdown-item" type="submit"><i class="icon-eye"></i>View Details</button>
                                        </form>

                                        <form action="{{route('testReport_edit')}}" method="get">
                                            @csrf
                                        <input type="hidden" name="id" value="{{$test->id}}">
                                      
                                        <button class="dropdown-item" type="submit"><i class="icon-pencil"></i>Edit</button>
                                        </form>
                                        @endif
                                        
                                      
                                        
                                        <form action="{{route('testReport_delete')}}" method="post">
                                            @csrf
                                        <input type="hidden" name="id" value="{{$test->id}}">
                                       
                                        <button class="dropdown-item" type="submit" onclick="return confirm('Are You Sure?')"><i class="icon-cross"></i>Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
    
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->
</x-sg-master>