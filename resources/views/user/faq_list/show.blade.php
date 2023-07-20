<x-sg-usermaster>
      <div class="text-center mb-3 py-2">
					<h4 class="font-weight-semibold mb-1">All questions are answered</h4>
				</div>
				<!-- /questions title -->
	

				<!-- Inner container -->
				<div class="d-flex align-items-start flex-column flex-md-row">

					<!-- Left content -->
					<div class="w-100 overflow-auto order-2 order-md-1">
					
		@foreach($faqs as $key=>$faq)

						<!-- Questions list -->
						<div class="card-group-control card-group-control-right">
							<div class="card mb-2">
								<div class="card-header">
									<h6 class="card-title">
										<a class="text-default collapsed" data-toggle="collapse" href="#{{$faq->uuid}}">
											<i class="icon-help mr-2 text-slate"></i> {{$faq->question}}
										</a>
									</h6>
								</div>

								<div id="{{$faq->uuid}}" class="collapse">
									<div class="card-body">
										{{$faq->answer}}
									</div>

									<div class="card-footer bg-transparent d-sm-flex align-items-sm-center border-top-0 pt-0">
										<span class="text-muted">Latest update: {{$faq->date}}</span>
									</div>
								</div>
							</div>
		                </div>
@endforeach							
						<!-- /questions list -->
					</div>
					<!-- /left content -->

		

		</div>
</x-sg-usermaster>    