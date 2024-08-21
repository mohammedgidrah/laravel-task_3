<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Models\Profile;
use App\Models\User;

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

// product
Route::resource('product', ProductsController::class);



// category
Route::resource('category', CategoriesController::class);

Route::resource('Users', UserController::class);

// user
// Route::get('/users', [UserController::class, 'index'])->name('users.index');




// Route::get('/one-to-one', function () {
//     $user = User::create(['username' => 'John Doe']);
//     Profile::create([
//         'user_id' => $user->id,
//         'email' => 'test@gmail.com',
//         'birthday' => '08-11-1991'
//     ]);
//     return response()->json([
//         'username' => $user->username,
//         'firstname' => $user->profile->firstname,
//         'lastname' => $user->profile->lastname,
//     ]);
// });

// Route::get('/one-to-one', function () {
//     $user = User::create(['username' => 'John Doe','email' => 'tessdsft@gmail.com']);
//     Profile::create([
//         'user_id' => $user->id,
//         'firstname' => 'John',
//         'lastname' => 'Doe',
//         'birthday' => '08-11-1991'
//     ]);
//     return response()->json([
//         'username' => $user->username,
//         'firstname' => $user->profile->firstname,
//         'lastname' => $user->profile->lastname,
//     ]);
// });
Route::get('/one-to-one', function () {
    $user = User::create(['username' => 'Tom Cruz','email'=>'test@gmail.com']);
    $user->profile()->create([
      'firstname' => 'Tom',
      'lastname' => 'Cruz',
      'birthday' => '01-02-2000'
    ]);
    return response()->json([
        'username' => $user->username,
        'firstname' => $user->profile->firstname,
        'lastname' => $user->profile->lastname,
    ]);
});
Route::get('/users', function () {
    $users = User::with(['profile'])->get();
    return view('users.index', compact('users'));
});






