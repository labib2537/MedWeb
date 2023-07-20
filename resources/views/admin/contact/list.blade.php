<x-sg-master>
    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Contact List</h5>
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
                    <th>Sender Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>

                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
            
           
             @foreach($messages as $key=>$msg)
                <tr>
               
                    <td>{{++$key}}</td>
                    <td>{{$msg->name}}</td>
                    <td>{{$msg->email}}</td>
                    <td>{{$msg->phone}}</td>
                    <td>{{$msg->message}}</td>

                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-reply"></i> Reply Message</a>
                                    
                                    <form action="{{route('contact_delete')}}" method="post">
                                        @csrf
                                    <input type="hidden" name="id" value="{{$msg->id}}">
                                    <button class="dropdown-item" type="submit" onclick="return confirm('Are you sure?')"><i class="icon-cross"></i>Delete</button>
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