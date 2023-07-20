<x-sg-usermaster>
    <div class="card">
        <div class="card-img-actions mx-1 mt-1">
        <iframe src="{{asset('uploads/reports/'.$report->report_file)}}" width="100%" height="800px"></iframe>
        
        </div>

        <div class="card-body text-center">
            <h6 class="font-weight-semibold">{{$report->patient_name}}</h6>
            <h4 class="font-weight-semibold">{{$report->test_name}}</h4>
            <h4 class="font-weight-semibold">{{$report->type}}</h4>

        
        </div>
    </div>
</x-sg-usermaster>