<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TestReportController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqListController;
use App\Http\Controllers\MedicalTestController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalTestAppointmentController;
use App\Http\Controllers\BedAllotmentController;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\AmbulanceRequestController;
use App\Http\Controllers\BedPatientController;
use App\Http\Controllers\HomepageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomepageController::class, 'index'])->name('/');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/edit', [ProfileController::class, 'edit2'])->name('profile.edit2');
    Route::post('/profile/update', [ProfileController::class, 'update2'])->name('profile.update2');
    Route::get('/profile/picture', [ProfileController::class, 'addProfileImage'])->name('profile.add_image');
    Route::post('/profile/picture_add', [ProfileController::class, 'pictureInsert'])->name('profile.pictureInsert');
    Route::get('/profile/picture_edit', [ProfileController::class, 'editProfileImage'])->name('profile.edit_image');
    Route::post('/profile/picture_update', [ProfileController::class, 'pictureUpdate'])->name('profile.pictureUpdate');
    Route::post('/profile/picture_remove', [ProfileController::class, 'pictureRemove'])->name('profile.imageRemove');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'isAdmin' ,'verified'])->name('admin');
Route::get('/user', function () {
    return view('user.dashboard');
})->middleware(['auth', 'isUser', 'verified'])->name('user');

Route::prefix('admin')->group(function () {
    //Doctors all pages with group------------------------------------------------------
    Route::prefix('doctor')->group(function () {
        Route::view('/add','admin.doctor.add' )->name('doctor_add');
        Route::post('/insert', [DoctorController::class, 'insert'])->name('doctor_insert');
        Route::get('/list', [DoctorController::class, 'list'])->name('doctor_list');
        Route::get('/show', [DoctorController::class, 'show'])->name('doctor_show');
        Route::get('/edit', [DoctorController::class, 'edit'])->name('doctor_edit');
        Route::post('/update', [DoctorController::class, 'update'])->name('doctor_update');
        Route::get('/delete', [DoctorController::class, 'delete'])->name('doctor_delete');
        Route::get('/search', [DoctorController::class, 'search'])->name('doctor_search');
    });
    
    //Patients all pages with group------------------------------------------------------
    Route::prefix('patient')->group(function () {
        Route::view('/add','admin.patient.add' )->name('patient_add');
        Route::post('/insert', [PatientController::class, 'insert'])->name('patient_insert');
        Route::get('/list', [PatientController::class, 'list'])->name('patient_list');
        Route::get('/edit', [PatientController::class, 'edit'])->name('patient_edit');
        Route::post('/update', [PatientController::class, 'update'])->name('patient_update');
        Route::post('/updateStatus', [PatientController::class, 'updateStatus'])->name('patient_updateStatus');
        Route::get('/delete', [PatientController::class, 'delete'])->name('patient_delete');
    });

      //Bed Allotment all pages with group------------------------------------------------------
      Route::prefix('bedAllotment')->group(function () {
        Route::view('/add','admin.bed_allotment.add' )->name('bed_add');
        Route::post('/insert', [BedAllotmentController::class, 'insert'])->name('bed_insert');
        Route::get('/list', [BedAllotmentController::class, 'list'])->name('bed_list');
        Route::get('/listView', [BedAllotmentController::class, 'listView'])->name('bed_listView');
        Route::get('/edit', [BedAllotmentController::class, 'edit'])->name('bed_edit');
        Route::post('/update', [BedAllotmentController::class, 'update'])->name('bed_update');
        // Route::post('/BedBook', [BedAllotmentController::class, 'bedBook'])->name('bed_book');
        Route::post('/delete', [BedAllotmentController::class, 'delete'])->name('bed_delete');
    });

     //Bed Allotment all pages with group------------------------------------------------------
     Route::prefix('bedPatient')->group(function () {
        Route::get('/add',[BedPatientController::class, 'viewForm'] )->name('bed_patient_add');
        Route::post('/insert', [BedPatientController::class, 'insert'])->name('bed_patient_insert');
        Route::get('/list', [BedPatientController::class, 'list'])->name('bed_patient_list');
        // Route::get('/listView', [BedAllotmentController::class, 'listView'])->name('bed_listView');
        Route::post('/edit', [BedPatientController::class, 'edit'])->name('bed_patient_edit');
        Route::post('/update', [BedPatientController::class, 'update'])->name('bed_patient_update');
        Route::post('/discharged', [BedPatientController::class, 'discharged'])->name('bed_discharged');
        // Route::post('/delete', [BedAllotmentController::class, 'delete'])->name('bed_delete');
    });
    
    Route::prefix('medicalTest')->group(function () {
        Route::view('/add','admin.medical_test.add' )->name('medical_test_add');
        Route::post('/insert', [MedicalTestController::class, 'insert'])->name('medical_test_insert');
        Route::get('/list', [MedicalTestController::class, 'list'])->name('medical_test_list');
        Route::post('/edit', [MedicalTestController::class, 'edit'])->name('medical_test_edit');
        Route::post('/update', [MedicalTestController::class, 'update'])->name('medical_test_update');
        Route::post('/delete', [MedicalTestController::class, 'delete'])->name('medical_test_delete');
        Route::get('/search', [MedicalTestController::class, 'search'])->name('medical_test_search');
    });
    
    //Test Report all pages with group------------------------------------------------------
    Route::prefix('Test_Report')->group(function () {
        Route::post('/upload', [TestReportController::class, 'upload'])->name('testReport_add');
        Route::post('/insert', [TestReportController::class, 'insert'])->name('testReport_insert');
        Route::get('/list', [TestReportController::class, 'list'])->name('testReport_list');
        Route::get('/edit', [TestReportController::class, 'edit'])->name('testReport_edit');
        Route::post('/update', [TestReportController::class, 'update'])->name('testReport_update');
        Route::post('/show', [TestReportController::class, 'show'])->name('testReport_show');
        Route::post('/delete', [TestReportController::class, 'delete'])->name('testReport_delete');
    });
    
    //appointment for user all pages with group------------------------------------------------------
    Route::prefix('appointment')->group(function () {
        Route::get('/reqlist', [AppointmentController::class, 'reqlist'])->name('appointment_req');
        Route::get('/list', [AppointmentController::class, 'list'])->name('appointment_list');
        Route::post('/updateStatus', [AppointmentController::class, 'setTime'])->name('appointment_set_time_update');
        Route::post('/delete', [AppointmentController::class, 'delete'])->name('appointment_delete');
        Route::post('/cancel', [AppointmentController::class, 'cancel'])->name('appointment_cancel');
        Route::post('/edit', [AppointmentController::class, 'edit'])->name('appointment_edit');
        Route::post('/update', [AppointmentController::class, 'update'])->name('appointment_time_update');

        // Route::post('/insert', [AppointmentController::class, 'insert'])->name('appointment_insert_user');
    
    });

     //ambulance for all pages with group------------------------------------------------------
     Route::prefix('ambulance')->group(function () {
        Route::view('/add','admin.ambulance.add' )->name('ambulance_add');
        Route::get('/reqlist', [AmbulanceRequestController::class, 'list'])->name('ambulance_req');
        Route::get('/list', [AmbulanceController::class, 'list'])->name('ambulance_list');
        Route::post('/delete', [AmbulanceController::class, 'delete'])->name('ambulance_delete');
        Route::post('/updateStatus', [AmbulanceController::class, 'updateStatus'])->name('ambulance_updateStatus');
        Route::post('/edit', [AmbulanceController::class, 'edit'])->name('ambulance_edit');
        Route::post('/update', [AmbulanceController::class, 'update'])->name('ambulance_update');
        Route::post('/insert', [AmbulanceController::class, 'insert'])->name('ambulance_insert');
        Route::post('/accept', [AmbulanceRequestController::class, 'accept'])->name('ambulance_accept');
        Route::post('/reject', [AmbulanceRequestController::class, 'reject'])->name('ambulance_reject');
    
    });

     //Medical appointment all pages with group------------------------------------------------------
     Route::prefix('medical_test')->group(function () {
        Route::get('/list', [MedicalTestAppointmentController::class, 'list'])->name('medical_test_appointment');
    
    });


    
    //Sliders all pages with group------------------------------------------------------
    Route::prefix('slider')->group(function () {
        Route::view('/add','admin.slider.add' )->name('slider_add');
        Route::post('/insert', [SliderController::class, 'insert'])->name('slider_insert');
        Route::get('/list', [SliderController::class, 'list'])->name('slider_list');
        Route::post('/show', [SliderController::class, 'show'])->name('slider_show');
        Route::post('/edit', [SliderController::class, 'edit'])->name('slider_edit');
        Route::post('/update', [SliderController::class, 'update'])->name('slider_update');
        Route::post('/updateStatus', [SliderController::class, 'updateStatus'])->name('slider_updateStatus');
        Route::post('/delete', [SliderController::class, 'delete'])->name('slider_delete');
        Route::post('/trash', [SliderController::class, 'trash'])->name('slider_trash');
        Route::post('/restore', [SliderController::class, 'restore'])->name('slider_restore');
        Route::post('/permanent_delete', [SliderController::class, 'permanent_delete'])->name('slider_permanent_delete');
    });
    
    //News all pages with group------------------------------------------------------
    Route::prefix('news')->group(function () {
        Route::view('/add','admin.news.add' )->name('news_add');
        Route::post('/insert', [NewsController::class, 'insert'])->name('news_insert');
        Route::get('/list', [NewsController::class, 'list'])->name('news_list');
        Route::post('/show', [NewsController::class, 'show'])->name('news_show');
        Route::post('/edit', [NewsController::class, 'edit'])->name('news_edit');
        Route::post('/update', [NewsController::class, 'update'])->name('news_update');
        Route::post('/updateStatus', [NewsController::class, 'updateStatus'])->name('news_updateStatus');
        Route::post('/delete', [NewsController::class, 'delete'])->name('news_delete');
    });
    
    
    //Contact all pages with group------------------------------------------------------
    Route::prefix('contact')->group(function () {
        Route::view('/','welcome' )->name('contact_add');
        Route::post('/insert', [ContactController::class, 'insert'])->name('contact_insert');
        Route::get('/list', [ContactController::class, 'list'])->name('contact_list');
        Route::post('/delete', [ContactController::class, 'delete'])->name('contact_delete');
    });
    
    //faq_list all pages with group------------------------------------------------------
    Route::prefix('faq_list')->group(function () {
        Route::view('add','admin.faq_list.add' )->name('faq_list_add');
        Route::post('/insert', [FaqListController::class, 'insert'])->name('faq_list_insert');
        Route::get('/list', [FaqListController::class, 'list'])->name('faq_list_list');
        Route::post('/delete', [FaqListController::class, 'delete'])->name('faq_list_delete');
        Route::post('/edit', [FaqListController::class, 'edit'])->name('faq_list_edit');
        Route::post('/update', [FaqListController::class, 'update'])->name('faq_list_update');
    });
    })->middleware(['auth', 'isAdmin', 'verified']);
    
    // USER Routes
    
    
    Route::prefix('user')->group(function () {
        //faq_list for user all pages with group------------------------------------------------------
    Route::prefix('faq_list')->group(function () {
        Route::get('/show', [FaqListController::class, 'show'])->name('faq_list_show');
    });
    
    //doctor for user all pages with group------------------------------------------------------
    Route::prefix('doctor')->group(function () {
        Route::get('/list', [DoctorController::class, 'list2'])->name('doctor_list_user');
        Route::post('/show', [DoctorController::class, 'show2'])->name('doctor_show_user');
        Route::get('/search', [DoctorController::class, 'search2'])->name('doctor_search_user');
        
        
    });
    //medical test for user all pages with group------------------------------------------------------
    Route::prefix('medicalTest')->group(function () {
        Route::get('/list', [MedicalTestController::class, 'listUser'])->name('medicalTest_list_user');
        Route::get('/search', [MedicalTestController::class, 'search2'])->name('medicalTest_search_user');
        Route::get('/appointment', [MedicalTestController::class, 'appointAdd'])->name('medicalTest_add_user');
        
        Route::post('/insert', [MedicalTestAppointmentController::class, 'insert'])->name('medicalTest_insert_user');
        Route::get('/show', [MedicalTestAppointmentController::class, 'show'])->name('medical_appointment_show');
        Route::post('/cancel', [MedicalTestAppointmentController::class, 'cancel'])->name('medical_appointment_cancel');
    });
    //appointment for user all pages with group------------------------------------------------------
    Route::prefix('appointment')->group(function () {
        Route::get('/add', [DoctorController::class, 'add'])->name('appointment_add_user');
        Route::post('/insert', [AppointmentController::class, 'insert'])->name('appointment_insert_user');
        Route::get('/list', [AppointmentController::class, 'list'])->name('appointment_list_user');
        Route::get('/show', [AppointmentController::class, 'show'])->name('appointment_show');

        // Route::post('/insert', [AppointmentController::class, 'insert'])->name('appointment_insert_user');
    
    });

     //ambulance for user all pages with group------------------------------------------------------
     Route::prefix('ambulance')->group(function () {
        Route::view('/add', 'user.ambulance.add')->name('ambulance_add_user');
        Route::post('/insert', [AmbulanceRequestController::class, 'insert'])->name('ambulance_insert_user');
        
        Route::get('/show', [AmbulanceRequestController::class, 'show'])->name('ambulance_show_user');

        Route::post('/cancel', [AmbulanceRequestController::class, 'cancel'])->name('ambulance_cancel');
    
    });

     //test report for user all pages with group------------------------------------------------------
     Route::prefix('test_report')->group(function () {
        
        // Route::post('/insert', [AmbulanceRequestController::class, 'insert'])->name('ambulance_insert_user');
        
        Route::get('/list', [TestReportController::class, 'listUser'])->name('report_list_user');

        Route::post('/show', [TestReportController::class, 'showUser'])->name('report_show_user');
    
    });
    })->middleware(['auth', 'isUser', 'verified']);
require __DIR__.'/auth.php';