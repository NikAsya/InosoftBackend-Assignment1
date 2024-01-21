    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\StudentController;
    use App\Http\Controllers\ClassController;

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

    Route::get('/', function () {
        return view('home');
    });


    // Example routes in routes/api.php

    //class
    Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/classes/create', [ClassController::class, 'create'])->name('classes.create');
    Route::post('/classes', [ClassController::class, 'store'])->name('classes.store');
    Route::get('/classes/{class}', [ClassController::class, 'edit'])->name('classes.edit');
    Route::put('/classes/{class}', [ClassController::class, 'update'])->name('classes.update');


    //students
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::post('/students', [StudentController::class, 'store']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::post('/students/filter', [StudentController::class, 'filter'])->name('students.filter');


    //subject
    Route::get('/subjects', 'SubjectController@index');
    Route::get('/subjects/{id}', 'SubjectController@show');
    Route::post('/subjects', 'SubjectController@store');
    Route::put('/subjects/{id}', 'SubjectController@update');

    //grades
    Route::get('/grades', 'GradeController@index');
    Route::get('/grades/{id}', 'GradeController@show');
    Route::post('/grades', 'GradeController@store');
    Route::put('/grades/{id}', 'GradeController@update');

    // Add routes for subjects and scores similarly
