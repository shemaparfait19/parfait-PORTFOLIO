<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParfaitController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Uncommenting the route for parfait view
Route::get('/parfait', function () {
    return view('parfait');
});
Route::get('/', [ParfaitController::class, 'welcome'])->name('projects.welcome');
// Route to display all parfaits
Route::get('/projects', [ParfaitController::class, 'index'])->name('projects.index');

// Route to create a new parfait
Route::get('/projects/create', [ParfaitController::class, 'create'])->name('projects.create');

// Route to store a new parfait
Route::post('/projects', [ParfaitController::class, 'store'])->name('projects.store');

// Route to show a specific parfait
Route::get('/projects/{parfait}', [ParfaitController::class, 'show'])->name('projects.show');

// Route to edit a specific parfait
Route::get('/projects/{parfait}/edit', [ParfaitController::class, 'edit'])->name('projects.edit');

// Route to update a specific parfait
Route::put('/projects/{parfait}', [ParfaitController::class, 'update'])->name('projects.update');

// Route to delete a specific parfait
Route::delete('/projects/{parfait}', [ParfaitController::class, 'destroy'])->name('projects.destroy');