<x-sg-master>
    <div class="card">
        <div class="card-img-actions mx-1 mt-1">
            <img class="card-img img-fluid" src="{{asset('uploads/images/sliders')}}/{{$slider->src}}" alt="{{$slider->alt}}">
        </div>
        <div class="card-body text-center">
            <h6 class="font-weight-semibold">{{$slider->name}}</h6>
            <h4 class="font-weight-semibold">{{$slider->heading}}</h4>
            <span class="d-block text-muted">{{$slider->paragraph}}</span>
            <ul class="list-inline list-inline-condensed mt-3 mb-0">
                <li class="list-inline-item"><a href="#" class="btn btn-outline bg-success btn-icon text-success border-success border-2 rounded-round legitRipple">
                    <i class="icon-lock4"></i></a>
                </li>
                <li class="list-inline-item">
                <form action="{{ route('slider_edit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$slider->id}}">
                    <button class="btn btn-outline bg-info-800 btn-icon text-info-800 border-info-800 border-2 rounded-round legitRipple"
                    type="submit"><i class="icon-pencil"></i></button>
                </form>
                </li>
                <li class="list-inline-item">
                    <form action="{{ route('slider_delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$slider->id}}">
                        <button class="btn btn-outline bg-danger-800 btn-icon text-danger-800 border-danger-800 border-2 rounded-round legitRipple"
                        type="submit" onclick="return confirm('Are You Sure?')"><i class="icon-trash"></i></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</x-sg-master>