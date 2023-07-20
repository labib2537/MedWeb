<x-sg-master>
     <!-- Horizontal cards -->
     <div class="mb-3 pt-2">
                    <h6 class="mb-0 font-weight-semibold">
                        Cabins
                    </h6>

                </div>

                <a href="{{route('bed_listView')}}" class="btn btn-outline alpha-success text-success-800 border-success-600 legitRipple mb-3">List View</a>

                <div class="row">
                    

			@foreach($beds as $bedbook)
            @if($bedbook->is_active==1)		

                    <div class="col-xl-3 col-md-6">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3">
                                    <a href="#">
                                        <img src="{{asset('global_assets/images/placeholders/green.png')}}"
                                            class="rounded-circle" width="42" height="42" alt="">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h6 class="mb-0">{{$bedbook->cabin_number}}</h6>
                                    
                                    @if($bedbook->cabin_type=='Single Bed')
                                    <span class="badge badge-flat badge-pill border-primary text-primary-600">{{$bedbook->cabin_type}}</span>
                                    @else
                                    <span class="badge badge-flat badge-pill border-success text-success-600">{{$bedbook->cabin_type}} </span>
                                    @endif
                                    
                                </div>

                                <div class="ml-3 align-self-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0"
                                                data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <form action="bed_management_book.php" method="post">
                                                    <input type="hidden" name="room" value="{{$bedbook->cabin_name}}">
                                                    @if($bedbook->is_active==1)
                                                    <button class="dropdown-item" type="submit" name="book"
                                                        disabled><i class="icon-calendar3"></i>Book Cabin</button>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3">
                                    <a href="#">
                                        <img src="{{asset('global_assets/images/placeholders/gray.png')}}"
                                            class="rounded-circle" width="42" height="42" alt="">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h6 class="mb-0">{{$bedbook->cabin_number}}</h6>
                                    @if($bedbook->cabin_type=='Single Bed')
                                    <span class="badge badge-flat badge-pill border-primary text-primary-600">{{$bedbook->cabin_type}}</span>
                                    @else
                                    <span class="badge badge-flat badge-pill border-success text-success-600">{{$bedbook->cabin_type}} </span>
                                    @endif
                                </div>

                                <div class="ml-3 align-self-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0"
                                                data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            
                                                <form action="{{route('bed_patient_add')}}" method="get">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$bedbook->id}}">
                                                    
                                                    <button class="dropdown-item" type="submit" name="book"
                                                    ><i class="icon-calendar3"></i>Book Cabin</button>
                                                    
                                                </form>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @endif
                    @endforeach

                </div>


                <!-- /horizontal cards -->
</x-sg-master>    