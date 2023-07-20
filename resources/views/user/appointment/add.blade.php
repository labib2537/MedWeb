<x-sg-usermaster>
    <!-- Fieldset legend -->
	
			<div class="row">
				<div class="col-md-12">

					<!-- Basic legend -->
					<div class="card">
						<div class="card-header header-elements-inline">
							<h5 class="card-title">Appoinment Form</h5>
							<div class="header-elements">
								<div class="list-icons">
									<a class="list-icons-item" data-action="collapse"></a>
									<a class="list-icons-item" data-action="reload"></a>
									<a class="list-icons-item" data-action="remove"></a>
								</div>
							</div>
						</div>

						<div class="card-body">
							<form action="{{route('appointment_insert_user')}}" method="post">
								@csrf
								<fieldset>
									
								<input name="doc_id" type="hidden" class="form-control" value="{{$doctor->id}}">
								<input name="start" type="hidden" class="form-control" value="{{$doctor->start_time}}">
								<input name="end" type="hidden" class="form-control" value="{{$doctor->end_time}}">
								<input name="available" type="hidden" class="form-control" value="{{ json_encode($doctor->practice_days) }}">
									<div class="row">

									<div class="form-group col-lg-6">
										<label>Specialist:</label><br>
										<input name="specialist" type="hidden" class="form-control" value="{{$doctor->specialist}}">
										<span style="font-size: 16px;" class="badge badge-light badge-striped badge-striped-left border-left-primary">{{$doctor->specialist}}</span>
									</div>
									<div class="form-group col-lg-6">
										<label>Doctor Name:</label><br>
										<input name="doctor_name" type="hidden" class="form-control" value="{{$doctor->name}}">
										<span style="font-size: 16px;" class="badge badge-light badge-striped badge-striped-left border-left-primary">{{$doctor->name}}</span>
										
									</div>



								</div>

									<div class="row">
									<div class="form-group col-lg-6">
										<label>Enter your name:</label>
										<input name="patient_name" type="text" class="form-control" placeholder="Name" value="{{auth()->user()->name}}" required>
									</div>
									<div class="form-group col-lg-6">
										<label>Enter Phone Number:</label>
										<input name="phone" type="text" class="form-control" placeholder="Phone Number" value="{{auth()->user()->phoneNumber ?? ''}}" required>
									</div>

                                    </div>

									<div class="form-group">
										<label class="d-block">Gender:</label>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input name="gender" value="Male" type="radio" class="form-input-styled" {{auth()->user()->gender == 'Male' ? 'checked' : ''}} checked data-fouc required>
												Male
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input name="gender" value="Female" type="radio" class="form-input-styled" {{auth()->user()->gender == 'Female' ? 'checked' : ''}} data-fouc required>
												Female
											</label>
										</div>
									</div>

									<div class="row">

									<div class="form-group  col-lg-6">
										<label>City:</label>
										<input name="city" type="text" class="form-control" placeholder="City" required>
									</div>

									<div class="form-group  col-lg-4">
										<label>Select your state:</label>
										<select name="state" data-placeholder="Select your state" class="form-control form-control-select2" data-fouc required>
											<option></option>
											<optgroup label="Dhaka">
												<option>Gazipur</option>
												<option>Tangail</option>
												<option>Manikganj</option>
												<option>Munshiganj</option>
												<option>Narsingdi</option>
												<option>Narayanganj</option>
												<option>Dhaka</option>
												<option>Faridpur</option>
												<option>Gopalganj</option>
												<option>Kishoreganj</option>
												<option>Madaripur</option>
												<option>Rajbari</option>
												<option>Shariatpur</option>
											</optgroup>
											<optgroup label="Chattogram">
											    <option>Bandarban</option>
												<option>Brahmanbaria </option>
												<option>Chandpur</option>
											    <option>Chattogram</option>
												<option>Comilla</option>
												<option>Cox's Bazar</option>
												<option>Feni</option>
												<option>Khagrachhari</option>
												<option>Lakshmipur</option>
												<option>Noakhali</option>
												<option>Rangamati</option>
												
												
											</optgroup>
											<optgroup label="Rajshahi">
												<option>Rajshahi</option>
												<option>Natore</option>
												<option>Sirajganj</option>
												<option>Pabna</option>
												<option>Bogra </option>
												<option>Chapai Nawabganj</option>
											</optgroup>
											<optgroup label="Barishal">
												<option>Barisal</option>
												<option>Barguna</option>
												<option>Bhola</option>
												<option>Jhalokati</option>
												<option>Pirojpur </option>
												<option>Patuakhali</option>
											</optgroup>
											<optgroup label="Mymensingh">
											    <option>Mymensingh</option>
												<option>Netrokona</option>
												<option>Kishoreganj</option>
												<option>Sherpur</option>
												<option>Jamalpur</option>
												<option>Tangail</option>	
											</optgroup>
											<optgroup label="Khulna">
												<option>Khulna</option>
												<option>Bagherhat</option>
												<option>Sathkhira</option>
												<option>Jessore</option>
												<option>Magura</option>
												<option>Jhenaidah</option>
												<option>Narail</option>
												<option>Kushtia</option>
												<option>Chuadanga </option>
												<option>Meherpur </option>
											</optgroup>
											<optgroup label="Rangpur">
												<option>Rangpur</option>
												<option>Gaibandha</option>
												<option>Nilphamari</option>
												<option>Kurigram</option>
												<option>Lalmonirhat</option>
												<option>Dinajpur</option>
												<option>Thakurgaon </option>
												<option>Panchagarh</option>
											</optgroup>
											<optgroup label="Sylhet">
												<option>Sylhet </option>
												<option>Habiganj</option>
											    <option>Moulvibazar</option>
												<option>Sunamganj</option>
											</optgroup>
										</select>
									</div>

									<div class="form-group col-lg-2">
										<label>Zip:</label>
										<input name="zip" type="text" class="form-control" placeholder="Zip" required>
									</div>

								</div>
<div class="row">
								
						<div class="form-group col-md-6">
                            <label>Appointment Date:</label>
                            <input id="appointment_date" name="date" type="date" class="form-control" required>
                        </div>

						<div class="form-group col-md-6">
                            <label>Select Time:</label>
                            <input name="time" type="time" class="form-control" required>
                        </div>

</div>


									
								</fieldset>


								<div class="text-right">
									
									<button type="submit" class="btn btn-primary">Make Appointment<i class="icon-paperplane ml-2"></i></button>
								</div>
							</form>
						</div>
					</div>
					<!-- /basic legend -->

				</div>


			</div>
			<!-- /fieldset legend -->
			

			
</x-sg-usermaster>    