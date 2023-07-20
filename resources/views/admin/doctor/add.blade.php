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

            <form action="{{ route('doctor_insert')}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="form-group">
                        <label>Doctor Type:</label>
                        <input value="{{ old('specialist') }}" name="specialist" type="text" class="form-control" placeholder="Doctor Type" required>
                        {{-- This chunk of code is to show the error messege --}}
                        @error('specialist')
                        <div class="alert alert-warning alert-styled-left alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            {{ $message }}
                        </div>
                        @enderror
                        {{-- This chunk of code is to show the error messege --}}
                    </div>

                    <div class="form-group">
                        <label>Doctor Name:</label>
                        <input value="{{ old('name') }}" name="name" type="text" class="form-control" placeholder="Doctor Name" >
                        {{-- This chunk of code is to show the error messege --}}
                        @error('name')
                            <div class="alert alert-warning alert-styled-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- This chunk of code is to show the error messege --}}
                    </div>

                    <div class="form-group">
                        <label>Experiences Summary:</label>
                        <input value="{{ old('Experiences_Summary') }}" name="Experiences_Summary" type="text" class="form-control" placeholder="EX : MBBS (DMC), FCPS (Surgery)" required>
                        {{-- This chunk of code is to show the error messege --}}
                        @error('Experiences_Summary')
                        <div class="alert alert-warning alert-styled-left alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            {{ $message }}
                        </div>
                        @enderror
                        {{-- / --This chunk of code is to show the error messege --}}
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input value="{{ old('email') }}" name="email" type="text" class="form-control" placeholder="Email" required>
                        {{-- This chunk of code is to show the error messege --}}
                        @error('email')
                            <div class="alert alert-warning alert-styled-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- This chunk of code is to show the error messege --}}
                    </div>

                    <div class="form-group">
                        <label>Practice Days:</label><br>
								
                                    <input type="checkbox" name="practice_days[]" value="Saturday"> Saturday<br>
                                    <input type="checkbox" name="practice_days[]" value="Sunday"> Sunday<br>
                                    <input type="checkbox" name="practice_days[]" value="Monday"> Monday<br>
                                    <input type="checkbox" name="practice_days[]" value="Tuesday"> Tuesday<br>
                                    <input type="checkbox" name="practice_days[]" value="Wednesday"> Wednesday<br>
                                    <input type="checkbox" name="practice_days[]" value="Thursday"> Thursday<br>
                                    <input type="checkbox" name="practice_days[]" value="Friday"> Friday<br>
                    </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Start Time:</label>
						 <input class="form-control" type="time" name="start_time">
                    </div>
                    <div class="form-group col-md-6">
                        <label>End Time:</label>
							<input class="form-control" type="time" name="end_time">	
                    </div>
                </div>


                    <!-- file uploader -->

                    <div class="form-group">
                    <label>Upload Image:</label>
                    <input name="image" type="file" class="file-input" data-fouc>
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

