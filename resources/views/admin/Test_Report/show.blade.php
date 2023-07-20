<x-sg-master>
    <div class="card">
        <div class="card-img-actions mx-1 mt-1">
        <iframe src="{{asset('uploads/reports/'.$report->report_file)}}" width="100%" height="800px"></iframe>
        
        </div>

        <div class="card-body text-center">
            <h6 class="font-weight-semibold">{{$report->patient_name}}</h6>
            <h4 class="font-weight-semibold">{{$report->test_name}}</h4>
            <h4 class="font-weight-semibold">{{$report->type}}</h4>
            <span class="d-block text-muted">{{$report->phone}}</span>

            <ul class="list-inline list-inline-condensed mt-3 mb-0">
                
                <li class="list-inline-item">
                    <form action="{{route('testReport_edit')}}" method="get">
                        @csrf
                            <input type="hidden" name="id" value="{{$report->id}}">
                            <button class="btn btn-outline bg-info-800 btn-icon text-info-800 border-info-800 border-2 rounded-round legitRipple"
                             type="submit"><i class="icon-pencil"></i></button>
                            </form>
                </li>

            
                <li class="list-inline-item">
                <form action="{{route('testReport_delete')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$report->id}}">
                    <input type="hidden" name="pdf" value="{{$report->report_file}}">
                            <button class="btn btn-outline bg-danger-800 btn-icon text-danger-800 border-danger-800 border-2 rounded-round legitRipple"
                             type="submit" onclick="return confirm('Are You Sure?')"><i class="icon-trash"></i></button>
                            </form>
                </li>

            </ul>
        </div>
    </div>
</x-sg-master>