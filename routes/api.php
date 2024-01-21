<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::get('/classes', [ClassController::class, 'index']);
//Route::get('/classes/{classId}/students', [ClassController::class, 'showWithStudents'])->where('classId', '[\w\-]+')->name('api.classes.showWithStudents');

// routes/api.php

//classes endpoint



// Existing route for fetching classes as JSON
Route::get('/classes/all', [ClassController::class, 'getAllClasses']);
Route::get('/classes-with-students', [ClassController::class, 'showAllWithStudents'])->name('api.classes.showAllWithStudents');

// New route for creating a class
Route::post('/classes/create', [ClassController::class, 'store'])->name('api.classes.store');
// New route for updating a class
Route::put('/classes/update/{id}', [ClassController::class, 'updateClass']);

//students endpoint
Route::get('/students', [StudentController::class, 'showAllStudents'])->name('api.students.showAllStudents');
Route::get('/students/{studentId}/grades', [StudentController::class, 'showWithGrades'])->name('api.students.showWithGrades');
Route::get('/students/{studentId}/grades/calculated-averages', [StudentController::class, 'showCalculatedAverages'])->name('api.students.showCalculatedAverages');
Route::get('/students/{studentId}/grades/{subject}/average', [StudentController::class, 'calculateAverageGrade'])
    ->where('studentId', '[\w\-]+')
    ->where('subject', '[\w\-]+')
    ->name('api.students.calculateAverageGrade');

Route::post('/students/{studentId}/newGrades', [StudentController::class, 'storeGrades'])->name('api.students.storeGrades');
