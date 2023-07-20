<x-sg-master>
<div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Add New Cabin</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">


<form action="{{route('bed_insert')}}" method="post" class="form-horizontal">
    @csrf
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Cabin Number</label>
            <div class="col-sm-9">
                <input name="number" type="text" placeholder="EX: C-1001" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Cabin Type</label>
            <div class="col-sm-9">
            <div class="form-check form-check-inline">
											<label class="form-check-label">
												<input name="type" value="Single Bed" type="radio" class="form-input-styled" checked data-fouc required>
												Single Bed
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input name="type" value="Double Bed" type="radio" class="form-input-styled" data-fouc required>
												Double Bed
											</label>
										</div>
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <button type="submit" class="btn bg-primary">Save</button>
    </div>
</form>

</div>
</div>
<!-- add new patient end -->

                 
</x-sg-master>    