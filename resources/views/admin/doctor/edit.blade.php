 
                <x-sg-master>
    <!-- add new doctor -->

   <!-- add new patient -->

 <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Edit Doctor Profile</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('doctor_update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <fieldset>

                                <input name="id" type="hidden" class="form-control" value="{{$editData->id}}" required>
                                <input name="uuid" type="hidden" class="form-control" value="{{$editData->uuid}}" required>
                                <div class="form-group">
                                    <label>Doctor Type:</label>
                                    <input name="specialist" type="text" class="form-control" placeholder="Doctor Type"
                                        value="{{$editData->specialist}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Doctor Name:</label>
                                    <input name="name" type="text" class="form-control" placeholder="Doctor Name"
                                        value="{{$editData->name}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Experiences Summary:</label>
                                    <input name="Experiences_Summary" type="text" class="form-control"
                                        placeholder="EX : MBBS (DMC), FCPS (Surgery)"
                                        value="{{$editData->Experiences_Summary}}" required>
                                </div>


                                <div class="form-group">
                                    <label>Email:</label>
                                    <input name="email" type="email" class="form-control" placeholder="Email"
                                        value="{{$editData->email}}" required>
                                </div>

                                <div class="form-group">
                        <label>Practice Days:</label><br>
								
                                    <input type="checkbox" name="practice_days[]" value="Saturday" {{ in_array('Saturday', $editData->practice_days) ? 'checked' : '' }}> Saturday<br>
                                    <input type="checkbox" name="practice_days[]" value="Sunday" {{ in_array('Sunday', $editData->practice_days) ? 'checked' : '' }}> Sunday<br>
                                    <input type="checkbox" name="practice_days[]" value="Monday" {{ in_array('Monday', $editData->practice_days) ? 'checked' : '' }}> Monday<br>
                                    <input type="checkbox" name="practice_days[]" value="Tuesday" {{ in_array('Tuesday', $editData->practice_days) ? 'checked' : '' }}> Tuesday<br>
                                    <input type="checkbox" name="practice_days[]" value="Wednesday" {{ in_array('Wednesday', $editData->practice_days) ? 'checked' : '' }}> Wednesday<br>
                                    <input type="checkbox" name="practice_days[]" value="Thursday" {{ in_array('Thursday', $editData->practice_days) ? 'checked' : '' }}> Thursday<br>
                                    <input type="checkbox" name="practice_days[]" value="Friday" {{ in_array('Friday', $editData->practice_days) ? 'checked' : '' }}> Friday<br>
                    </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Start Time:</label>
						 <input class="form-control" type="time" name="start_time" value="{{$editData->start_time}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>End Time:</label>
							<input class="form-control" type="time" name="end_time" value="{{$editData->end_time}}">	
                    </div>
                </div>

                                <!-- file uploader -->

                                <div class="form-group">
                                    <label>Upload Image:</label>
                                    <input name="newimage" type="file" class="file-input" data-fouc>
                                    <img src="{{asset('uploads/images/doctors/'.$editData->image)}}"
                                        style="width:100px;height:100px">
                                    <input name="oldimage" disabled type="text" class="form-control" value="{{$editData->image}}">

                                </div>

                            </fieldset>


                            <div class="text-center mt-2">
                                <button type="submit" class="btn btn-primary">Save<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>



                    </div>
                </div>



                <!-- add new patient end -->
</x-sg-master>

