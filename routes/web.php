<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SchoolController as AdminSchoolController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\LectureUnitController;
use App\Http\Controllers\Admin\RegisteredStudentController;
use App\Http\Controllers\Admin\UnitController as AdminUnitController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\Students\LessonController;
use App\Http\Controllers\Students\TranscriptController;
use App\Http\Controllers\Examiner\TranscriptController as ExaminerTranscriptController;
use App\Http\Controllers\Students\UnitRegistrationController;
use App\Http\Controllers\Teachers\CourseController;
use App\Http\Controllers\Teachers\StudentController as TeacherStudentController;
use App\Http\Controllers\Teachers\TeachingUnit;
use App\Http\Controllers\Teachers\UnitMarkController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/schools', [SchoolController::class, 'index'])->name('schools');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:student', 'prefix' => 'student', 'as' => 'student.'], function () {
        Route::resource('lessons', LessonController::class);
        Route::get('transcript{userId}', [TranscriptController::class, 'index'])->name('transcript');
        Route::get('/registerunits', [UnitRegistrationController::class, 'index'])->name('registerunits');
        Route::post('/registerunits', [UnitRegistrationController::class, 'store'])->name('registerunits.store');
    });
    Route::group(['middleware' => 'role:teacher', 'prefix' => 'teacher', 'as' => 'teacher.'], function () {
        Route::resource('courses', CourseController::class);
        Route::get('students', [TeacherStudentController::class, 'index'])->name('students');
        Route::get('/schools', [AdminSchoolController::class, 'index'])->name('schools');
        Route::get('/teaching-unit', [TeachingUnit::class, 'index'])->name('teaching.unit');
        Route::get('/teacher/students/{studentId}/assign-marks', [UnitMarkController::class, 'index'])
            ->name('studentsmark');
        Route::post('/teacher/students/{studentId}/assign-marks', [UnitMarkController::class, 'store'])
            ->name('studentsmark.store');
    });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('users', UserController::class);
        // student
        Route::get('students', [RegisteredStudentController::class, 'liststudent'])->name('students');
        Route::get('students/enroll', [RegisteredStudentController::class, 'index'])->name('students.enroll');
        Route::post('students/enroll', [RegisteredStudentController::class, 'enroll'])->name('students.enroll.store');

        // Lecturer
        Route::get('lecturers', [LectureUnitController::class, 'index'])->name('lecturers');
        Route::get('/lecturesunit', [LectureUnitController::class, 'lecturesunit'])->name('lecturesunit');
        Route::post('/lecturesunit', [LectureUnitController::class, 'assignUnitToLecturer'])->name('lecturesunit.store');
        // school
        Route::get('/schools', [AdminSchoolController::class, 'index'])->name('schools');
        Route::get('/schools/create', [AdminSchoolController::class, 'create'])->name('schools.create');
        Route::post('/schools', [AdminSchoolController::class, 'store'])->name('schools.store');
        // course
        Route::get('/courses', [AdminCourseController::class, 'index'])->name('courses');
        Route::get('/courses/create', [AdminCourseController::class, 'create'])->name('courses.create');
        Route::post('/courses', [AdminCourseController::class, 'store'])->name('courses.store');
        // unit
        Route::get('/units', [AdminUnitController::class, 'index'])->name('units');
        Route::get('/units/create', [AdminUnitController::class, 'create'])->name('units.create');
        Route::post('/units', [AdminUnitController::class, 'store'])->name('units.store');
    });

    Route::group(['middleware' => 'role:academic', 'prefix' => 'academic', 'as' => 'academic.'], function () {
        Route::resource('users', UserController::class);
        // student
        Route::get('students', [RegisteredStudentController::class, 'liststudent'])->name('students');
        Route::get('students/enroll', [RegisteredStudentController::class, 'index'])->name('students.enroll');
        Route::post('students/enroll', [RegisteredStudentController::class, 'enroll'])->name('students.enroll.store');
        // school
        Route::get('/schools', [AdminSchoolController::class, 'index'])->name('schools');
        Route::get('/schools/create', [AdminSchoolController::class, 'create'])->name('schools.create');
        Route::post('/schools', [AdminSchoolController::class, 'store'])->name('schools.store');
        // course
        Route::get('/courses', [AdminCourseController::class, 'index'])->name('courses');
        Route::get('/courses/create', [AdminCourseController::class, 'create'])->name('courses.create');
        Route::post('/courses', [AdminCourseController::class, 'store'])->name('courses.store');
        // unit
        Route::get('/units', [AdminUnitController::class, 'index'])->name('units');
        Route::get('/units/create', [AdminUnitController::class, 'create'])->name('units.create');
        Route::post('/units', [AdminUnitController::class, 'store'])->name('units.store');
    });

    Route::group(['middleware' => 'role:examiner', 'prefix' => 'examiner', 'as' => 'examiner.'], function () {
        Route::resource('users', UserController::class);
        // student
        Route::get('students', [RegisteredStudentController::class, 'liststudent'])->name('students');
        // school
        Route::get('/schools', [AdminSchoolController::class, 'index'])->name('schools');
        // course
        Route::get('/courses', [AdminCourseController::class, 'index'])->name('courses');
        // unit
        Route::get('/units', [AdminUnitController::class, 'index'])->name('units');
        // transcript
        Route::get('/transcript', [ExaminerTranscriptController::class, 'index'])->name('transcripts');
    });
});
