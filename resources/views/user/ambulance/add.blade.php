<x-sg-usermaster>
    
			<!-- Fieldset legend -->
			<div class="row">
				<div class="col-md-12">

					<!-- Basic legend -->
					<div class="card">
						<div class="card-header header-elements-inline">
							<h5 class="card-title">Request for Ambulance</h5>
							<div class="header-elements">
								<div class="list-icons">
									<a class="list-icons-item" data-action="collapse"></a>
									<a class="list-icons-item" data-action="reload"></a>
									<a class="list-icons-item" data-action="remove"></a>
								</div>
							</div>
						</div>

						<div class="card-body">
							<form action="{{route('ambulance_insert_user')}}" method="post">
                                @csrf
								<fieldset>
									
									

									<div class="form-group">
										<label>Enter Your Name:</label>
										<input name="name" type="text" class="form-control" placeholder="Name" required>
									</div>

                                    <div class="form-group">
										<label>Enter Your Address:</label>
										<input name="address" type="text" class="form-control" placeholder="Address" required>
									</div>

                                    <div class="form-group">
										<label>Enter Your Phone number:</label>
										<input name="phone" type="text" class="form-control" placeholder="Phone Number" required>
									</div>



									<div class="form-group">
										<label>Your Message:</label>
										<textarea name="message" rows="5" cols="5" class="form-control" placeholder="Enter your message here" required></textarea>
									</div>
								</fieldset>


								<div class="text-right">
									<button type="submit" class="btn btn-primary">Send<i class="icon-paperplane ml-2"></i></button>
								</div>
							</form>
						</div>
					</div>
					<!-- /basic legend -->

				</div>


			</div>
			<!-- /fieldset legend -->

</x-sg-usermaster>