<x-sg-master>
    <!-- All runtimes -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Add New FAQ's</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="{{route('faq_list_insert')}}" method="post">
                @csrf
                <fieldset>
                    
                    

                    <div class="form-group">
                        <label>Question:</label>
                        <input name="qus" type="text" class="form-control" placeholder="Question" required>
                    </div>

                    <div class="form-group">
                        <label>Answer:</label>
                        <input name="ans" type="text" class="form-control" placeholder="Answer" required>
                    </div>

                    <div class="form-group">
                        <label>Posted Date:</label>
                        <input name="date" type="text" class="form-control" placeholder="Posted Date" required>
                    </div>
            
                
                </fieldset>


                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-primary">Save<i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
            

            
        </div>
    </div>
    <!-- /all runtimes -->

    
    
</x-sg-master>