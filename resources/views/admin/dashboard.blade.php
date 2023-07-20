@php
use Carbon\Carbon;
   
    $totalAdmitted = App\Models\BedAllotment::where('is_active', 1)->count();
    $bedRemain = App\Models\BedAllotment::where('is_active', 0)->count();

    $totalAmbulanceReq = App\Models\AmbulanceRequest::count();
    $pendingAmbulanceReq = App\Models\AmbulanceRequest::where('is_active', 0)
                                                      ->where('is_reject', 0)->count();

    $totalReport = App\Models\MedicalTestAppointment::count();
    $todayTest = App\Models\MedicalTestAppointment::where('date', Carbon::today())->count();
    $pendingReport = App\Models\MedicalTestAppointment::where('report_file', null)->count();

    $totalAppointment = App\Models\Appointment::count();
    $todayAppoint = App\Models\Appointment::where('date', Carbon::today())->count();
    $pendingAppointment = App\Models\Appointment::where('is_active', 0)->count();

@endphp



<x-sg-master>
     <!-- simple statistics -->

     <!-- total admitted, ambulance request, medical report and appointment display -->
<div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body bg-blue-400 has-bg-image">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="mb-0">{{$totalAdmitted}}</h3>
                                <span class="text-uppercase font-size-xs">total admitted</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-enter3 icon-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body bg-danger-400 has-bg-image">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="mb-0">{{$totalAmbulanceReq}}</h3>
                                <span class="text-uppercase font-size-xs">total ambulance request</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-truck icon-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body bg-success-400 has-bg-image">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-files-empty icon-3x opacity-75"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="mb-0">{{$totalReport}}</h3>
                                <span class="text-uppercase font-size-xs">total medical report</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body bg-indigo-400 has-bg-image">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-calendar3 icon-3x opacity-75"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="mb-0">{{$totalAppointment}}</h3>
                                <span class="text-uppercase font-size-xs">total appointment</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- total cabin remain, ambulance request pending, medical report complete and appointment pending -->
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-drawer2 icon-3x text-blue-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$bedRemain}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">total Cabin remain</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-truck icon-3x text-danger-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{$pendingAmbulanceReq}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">ambulance request pending</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{$totalReport-$pendingReport}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">total report complete</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-files-empty icon-3x text-success-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{$pendingAppointment}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">total appointment pending</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-calendar3 icon-3x text-indigo-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /simple statistics -->

            <!-- today's Information -->

            <h4 class="mb-3 font-weight-semibold">
					Today's Information
			</h4>
<!-- today's appointment -->
            <div class="col-xl-12">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                               
                                <span class="text-uppercase font-size-sm text-indigo">Appoinment</span>
                                <h3 class="font-weight-semibold mb-0">{{$todayAppoint}}</h3>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-calendar3 icon-3x text-indigo-400"></i>
                            </div>
                        </div>
                    </div>
           </div>
<!-- today's medical test appointment -->
           <div class="col-xl-12">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                               
                                <span class="text-uppercase font-size-sm text-success">Medical Test Appointment</span>
                                <h3 class="font-weight-semibold mb-0">{{$todayTest}}</h3>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-lab icon-3x text-success-400"></i>
                            </div>
                        </div>
                    </div>
           </div>


            




            
</x-sg-master>