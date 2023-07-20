<x-sg-master>
 <!-- add new patient -->

 <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Add New Patient</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">


                        <form action="{{route('bed_patient_insert')}}" method="post" class="form-horizontal">
                            @csrf

                            <input type="hidden" name="bed_id" value="{{$bed->id}}">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Patient Name</label>
                                    <div class="col-sm-9">
                                        <input name="name" type="text" placeholder="Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Age</label>
                                    <div class="col-sm-9">
                                        <input name="age" type="text" placeholder="Age" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input name="phone" type="text" placeholder="+088 XXX XX XXXXXX"
                                            data-mask="+99-99-9999-9999" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Address</label>
                                    <div class="col-sm-9">
                                        <input name="add" type="text" placeholder="Ring street 12, building D, flat #67"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Time And Date</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                            <input name="date" type="text" class="form-control daterange-basic"
                                                value="01/01/2023 - 01/31/2023" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Room Number</label>
                                    <div class="col-sm-9">
                                        <input name="room" type="text" value="{{$bed->cabin_number}}"
                                            placeholder="Room Number" class="form-control" required>
                                    </div>
                                </div>


                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn bg-primary">Admit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- add new patient end -->
</x-sg-master>
