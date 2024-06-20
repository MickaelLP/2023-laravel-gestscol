<?php

use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\FormationController as AdminFormationController;
use App\Http\Controllers\Admin\GroupController as AdminGroupController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return redirect()->route('admin/student.index');
// });

Route::get('/student', [StudentController::class, 'index'])->name("student.index");

Route::get('/hello/{name}', function ($name){
    return 'hello ' . $name;
});

Route::get('/student/{student}', [StudentController::class, 'show'])->name("student.show");

Route::get('/formation', [FormationController::class, 'index'])->name("formation.index");

Route::get('/formation/{formation}', [FormationController::class, 'show'])->name("formation.show");

// Breeze 
Route::get('/', function () {
    // return view('welcome');
    // return view('home');
    return redirect()->route('planning');
});

Route::get('/planning', function () {
    return view('planning');
})->name('planning');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// gère les routes automatiquement avec group
Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
    'middleware' => ['auth']
], function(){
    Route::resource('/group', AdminGroupController::class);
    Route::resource('/course', AdminCourseController::class);
    Route::resource('/formation', AdminFormationController::class);
    Route::resource('/student', AdminStudentController::class);
});

require __DIR__.'/auth.php';