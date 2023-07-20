<x-sg-master>
		<!-- add new patient -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Edit Slider Information</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('slider_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <input type="hidden" name="id" class="form-control"
                                value="{{$slide->id}}">
                                <input type="hidden" name="uuid" class="form-control"
                                    value="{{$slide->uuid}}">
                            <div class="form-group">
                                <label>Slider Name:</label>
                                <input name="name" type="text" class="form-control" placeholder="Name" 
                                value="{{$slide->name}}" required>
                            </div>
                            <div class="form-group">
                                <label>Slider Heading:</label>
                                <input name="heading" type="text" class="form-control" placeholder="Heading"
                                value="<?=$slide->heading?>" required>
                            </div>
                            <div class="form-group">
                                <label>Slider Paragraph:</label>
                                <input name="paragraph" type="text" class="form-control" placeholder="paragraph" value="<?=$slide->paragraph?>" required>
                            </div>
                            <div class="form-group">
                            <label>Upload Image:</label>	
                            <input name="newimage" type="file" class="file-input">
                            <img src="{{asset('uploads/images/sliders')}}/{{$slide->src}}" style="width:100px;height:100px">
                            <input name="oldimage" type="hidden" class="form-control" value="{{$slide->src}}">
                            </div>    
                        </fieldset>
                        <div class="text-center mt-2">
                            <button type="submit" class="btn btn-primary">Save<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
</x-sg-master>

