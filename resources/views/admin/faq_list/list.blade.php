<x-sg-master>
    <div class="card">
    
        <div class="card-header header-elements-inline">
            <h5 class="card-title">FAQ's List</h5>
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
                    <th>Serial Number</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Posted Date</th>
                    <th>Created at</th>
                    
                    
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($faqs as $key=>$faq)
                <tr>
                    <td>{{++$key}}</td>	
                    <td>{{$faq->question}}</td>
                    <td>{{$faq->answer}}</td>
                    <td>{{$faq->date}}</td>	
                    <td>{{$faq->created_at}}</td>	
                    
 
                    <td class="text-center">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">				    
                                
                                    <form action="{{route('faq_list_edit')}}" method="post">
                                        @csrf
                                    <input type="hidden" name="id" value="{{$faq->id}}">
                                    <input type="hidden" name="uuid" value="{{$faq->uuid}}">
                                    <button class="dropdown-item" type="submit"><i class="icon-pencil"></i>Edit</button>
                                    </form>
                                    
                                    <form action="{{route('faq_list_delete')}}" method="post">
                                        @csrf
                                    <input type="hidden" name="id" value="{{$faq->id}}">
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