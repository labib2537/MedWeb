<x-sg-master>
   <!-- add new doctor -->

   <div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Add New Doctor</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('slider_insert')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset>
                <label>Slider Name:</label>
                <x-sg-text value="{{ old('name') }}" name="name" placeholder="Slider Name" /><br>
                {{-- This chunk of code is to show the error messege --}}
                @error('name')
                <div class="alert alert-warning alert-styled-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    {{ $message }}
                </div>
                @enderror
                {{-- This chunk of code is to show the error messege --}}
                <label>Slider Heading:</label>
                <x-sg-text value="{{ old('heading') }}" name="heading" placeholder="Slider Heading" /><br>
                {{-- This chunk of code is to show the error messege --}}
                @error('heading')
                <div class="alert alert-warning alert-styled-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    {{ $message }}
                </div>
                @enderror
                {{-- This chunk of code is to show the error messege --}}
                <label>Slider Paragraph:</label>
                <x-sg-text value="{{ old('paragraph') }}" name="paragraph" placeholder="Slider Paragraph" /><br>
                {{-- This chunk of code is to show the error messege --}}
                @error('paragraph')
                <div class="alert alert-warning alert-styled-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    {{ $message }}
                </div>
                @enderror
                {{-- This chunk of code is to show the error messege --}}
                <!-- file uploader -->
                <div class="form-group">
                <label>Upload Image:</label>
                <input name="src" type="file" class="file-input" data-fouc>
                </div>
            </fieldset>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-primary">Save<i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </div>
</div>
<!-- add new doctor end -->
</x-sg-master>

