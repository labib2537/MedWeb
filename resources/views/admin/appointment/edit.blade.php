<x-sg-master>
<div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Edit Appoinment Time</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="{{route('appointment_time_update')}}" method="post">
                @csrf
					<input type="hidden" name="id" value="{{$setTime->id}}">
                <fieldset>
                    
                    <div class="form-group">
                        <label>Time:</label>
                        <input name="time" type="text" class="form-control" placeholder="EX: 18 May 2023 at 4PM" value="{{$setTime->set_appoint_time}}" required>
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