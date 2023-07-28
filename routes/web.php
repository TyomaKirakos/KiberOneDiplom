<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'main'])->name('main');
Route::post('/', [ApplicationController::class, 'sendApplication']);
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::get('/payment', [MainController::class, 'payment'])->name('payment');
Route::get('/catalog', [MainController::class, 'catalog'])->name('catalog');
Route::get('/thanks', [MainController::class, 'thanks'])->name('thanks');

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth')->group(function (){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/group{id}', [GroupController::class, 'showGroupPage'])->name('group-page');

    Route::middleware('isTeacher')->group(function () {
       Route::prefix('teacher')->group(function (){
            Route::get('/students-panel', [UserController::class, 'showStudentsList'])->name('students-list');
            Route::get('/change-money{id}', [UserController::class, 'showChangeMoney'])->name('change-money');
            Route::post('/change-money{user}', [UserController::class, 'changeMoney']);
           Route::get('/student{id}', [UserController::class, 'showStudentProfile'])->name('student-profile');

           Route::get('/groups-panel', [GroupController::class, 'showGroupsList'])->name('groups-list');
           Route::get('/change-homework{id}', [GroupController::class, 'showChangeHomework'])->name('change-homework');
           Route::post('/change-homework{group}', [GroupController::class, 'changeHomework'])->name('HomeworkChange');
       });
    });

    Route::middleware('isAdmin')->group(function (){
       Route::prefix('admin')->group(function (){
           Route::get('/users-panel', [UserController::class, 'showUsersPanel'])->name('users-panel');
           Route::get('/create-user', [UserController::class, 'showUserRegistration'])->name('create-user');
           Route::post('/create-user', [UserController::class, 'registerUser']);
           Route::get('/user{id}', [UserController::class, 'showUserProfile'])->name('user-profile');
           Route::get('/update-user{id}', [UserController::class, 'showUpdateUser'])->name('update-user');
           Route::post('/update-user{user}', [UserController::class, 'updateUser'])->name('UserUpdate');
           Route::get('/delete-user{id}', [UserController::class, 'deleteUser'])->name('delete-user');

           Route::get('/groups-panel', [GroupController::class, 'showGroupsPanel'])->name('groups-panel');
           Route::get('/create-group', [GroupController::class, 'showGroupCreation'])->name('create-group');
           Route::post('/create-group', [GroupController::class, 'createGroup']);
           Route::get('/delete-group{id}', [GroupController::class, 'deleteGroup'])->name('delete-group');

           Route::get('/applications-panel', [ApplicationController::class, 'showApplicationsPanel'])->name('applications-panel');
           Route::get('/handle-application{id}', [ApplicationController::class, 'handleApplications'])->name('handle-application');
           Route::get('/delete-application{id}', [ApplicationController::class, 'deleteApplication'])->name('delete-application');

           Route::get('/products-panel', [ProductController::class, 'showProductsPanel'])->name('products-panel');
           Route::get('/create-product', [ProductController::class, 'showProductsCreation'])->name('create-product');
           Route::post('/create-product', [ProductController::class, 'createProduct']);
           Route::get('/update-product{id}', [ProductController::class, 'showUpdateProduct'])->name('update-product');
           Route::post('/update-product{product}', [ProductController::class, 'updateProduct'])->name('ProductUpdate');
           Route::get('/delete-product{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');
       });
    });
});



