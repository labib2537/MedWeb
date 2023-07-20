@php

use Carbon\Carbon;

$date = Carbon::createFromFormat('Y-m-d', $anews->post_time);
$formattedDate = $date->format('d F Y');


@endphp

<x-sg-master>
<div class="row">
    <div class="col-md-6">

<div class="card">
							<div class="card-img-actions mx-1 mt-1">
								<img class="card-img img-fluid" src="{{asset('uploads/images/news/'.$anews->src)}}" alt="">
							</div>

							<div class="card-body text-center">
								<h4 class="font-weight-semibold">{{$anews->heading}}</h4>
								<h6 class="text-muted">{{$formattedDate}}</h6>
                                <p class="text-dark">{{$anews->paragraph}}</p>
							</div>
						</div>
                   </div>    
</div>
</x-sg-master>