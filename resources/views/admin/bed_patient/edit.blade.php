<x-sg-master>
 <!-- add new patient -->

 <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Edit Patient Bed</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">


                        <form action="{{route('bed_patient_update')}}" method="post" class="form-horizontal">
                            @csrf

                            <input type="hidden" name="id" value="{{$edit->id}}">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Patient Name</label>
                                    <div class="col-sm-9">
                                        <input name="name" type="text" placeholder="Name" value="{{$edit->patient_name}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Age</label>
                                    <div class="col-sm-9">
                                        <input name="age" type="text" placeholder="Age" value="{{$edit->age}}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input name="phone" type="text" placeholder="+088 XXX XX XXXXXX"
                                            data-mask="+99-99-9999-9999" value="{{$edit->phone}}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Address</label>
                                    <div class="col-sm-9">
                                        <input name="add" type="text" placeholder="Ring street 12, building D, flat #67" value="{{$edit->address}}"
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
                                            <input name="date" type="text" class="form-control daterange-basic" value="{{$edit->date}}"
                                                value="01/01/2023 - 01/31/2023" required>
                                        </div>
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
