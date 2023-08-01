<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WhatsappSessionsController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\CalendarController;

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

// Authentication
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginUser'])->name('loginUser');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Home
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('dashboard/get-activity-data', [DashboardController::class, 'activityData'])->name('activityData');

    // Users
    Route::get('/users/all', [UsersController::class, 'all'])->name('allUsers');
    Route::get('/users/delete/{id}', [UsersController::class, 'delete'])->name('deleteUser');
    Route::get('users/{status?}', [UsersController::class, 'index'])->name('users');
    Route::get('users/change-status/{id}/{status}', [UsersController::class, 'changeStatus'])->name('changeStatus');
    Route::post('users-listing', [UsersController::class, 'listing'])->name('usersListing');

    // Whatsapp
    Route::get('whatsapp-sessions', [WhatsappSessionsController::class, 'index'])->name('whatsappSessions');
    Route::post('whatsapp-sessions/listing', [WhatsappSessionsController::class, 'listing'])->name('whatsappSessionsListing');

    // Community
    Route::get('community', [CommunityController::class, 'index'])->name('community');
    Route::post('community/change-status', [CommunityController::class, 'changeStatus'])->name('changeCommunityStatus');
    Route::get('community/list', [CommunityController::class, 'listView'])->name('communityListView');
    Route::post('community/listing', [CommunityController::class, 'listing'])->name('communityListing');

    // Topic
    Route::get('topics', [CategoriesController::class, 'index'])->name('topics');
    Route::post('categories/add', [CategoriesController::class, 'add'])->name('addCategory');
    Route::get('topics/edit/{id}', [CategoriesController::class, 'edit'])->name('editCategory');
    Route::post('update', [CategoriesController::class, 'update'])->name('updateCategory');
    Route::get('topics/sub-categories/{categoryID}', [SubCategoriesController::class, 'listing'])->name('subCategoryListing');
    Route::post('/subcategories/add', [SubcategoriesController::class, 'add'])->name('addSubCategory');
    Route::get('subcategories/edit/{subCategoryID}', [SubCategoriesController::class, 'edit'])->name('editSubCategory');
    Route::post('/subcategories/update', [SubCategoriesController::class, 'update'])->name('updateSubCategory');
    Route::get('topics/{subCategoryID}', [TopicsController::class, 'listing'])->name('topicsListing');
    Route::post('topics/add', [TopicsController::class, 'add'])->name('addTopic');
    Route::delete('topics/{id}', [TopicsController::class, 'delete'])->name('deleteTopic');
    Route::post('topics/update', [TopicsController::class, 'update'])->name('updateTopic');

    // Calendar
    Route::get('calendar', [CalendarController::class, 'index'])->name('calendar');
    Route::get('calendar/listing', [CalendarController::class, 'listing'])->name('calendarListing');
    Route::get('calendar/delete/{id}', [CalendarController::class, 'delete'])->name('deleteCalendar');
    Route::get('/calendar/add', [CalendarController::class, 'add'])->name('addCalendar');
    Route::post('calendar/save', [CalendarController::class, 'save'])->name('saveCalendar');
    Route::get('calendar/edit/{id}', [CalendarController::class, 'edit'])->name('editCalendar');
});
