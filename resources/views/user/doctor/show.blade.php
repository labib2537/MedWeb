<x-sg-usermaster>
<!-- User details (with sample pattern) -->

<div class="card">
        <div class="card-body bg-blue text-center card-img-top"
            style="background-image: url(../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
            <div class="card-img-actions d-inline-block mb-3">
                <img class="img-fluid rounded-circle" src="{{asset('uploads/images/doctors/'.$doctor->image)}}"
                    width="170" height="170" alt="">
            </div>

            <h6 class="font-weight-semibold mb-0">{{$doctor->name}}</h6>
            <span class="d-block opacity-75">{{$doctor->specialist}}</span>

            
        </div>

        <div class="card-body border-top-0">
            <div class="d-sm-flex flex-sm-wrap mb-3">
                <div class="font-weight-semibold">Full name:</div>
                <div class="ml-sm-auto mt-2 mt-sm-0">{{$doctor->name}}</div>
            </div>

            <div class="d-sm-flex flex-sm-wrap mb-3">
                <div class="font-weight-semibold">Experiences Summary:</div>
                <div class="ml-sm-auto mt-2 mt-sm-0">{{$doctor->Experiences_Summary}}</div>
            </div>

            <div class="d-sm-flex flex-sm-wrap mb-3">
                <div class="font-weight-semibold">Email:</div>
                <div class="ml-sm-auto mt-2 mt-sm-0">{{$doctor->email}}</div>
            </div>

            <div class="d-sm-flex flex-sm-wrap">
                <div class="font-weight-semibold">Practice Days:</div>
             
                <p class="ml-sm-auto mt-2 mt-sm-0">
                @if(count($doctor->practice_days)==7)
                Everyday&nbsp; 
                @else
                @foreach($doctor->practice_days as $day)
                    {{$day}}&nbsp;
                @endforeach
                @endif
                at {{\Carbon\Carbon::parse($doctor->start_time)->format('h:i A')}} - {{\Carbon\Carbon::parse($doctor->end_time)->format('h:i A')}}
                </p>
            </div>
            <form action="{{route('appointment_add_user')}}" method="get">
                @csrf
									<input type="hidden" name="id" value="{{$doctor->id}}">
									<input type="submit"  class="btn bg-teal btn-ladda btn-ladda-progress float-right mt-3" data-style="expand-left" data-spinner-size="20" name="submit" value="Make an Appointment">
								</form>

        </div>
    </div>

        
						<!-- /user details (with sample pattern) -->
</x-sg-usermaster>