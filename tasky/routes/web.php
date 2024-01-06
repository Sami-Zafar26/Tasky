<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return view('welcome');
});
Route::post('/contact-us', [TaskController::class, 'contact_us'])->name('contact-us');
Auth::routes();

Route::group(['middleware' => 'is_user'], function () {
Route::get('/all-tasks', [App\Http\Controllers\HomeController::class, 'index'])->name('all-tasks');
// Route::get('/tasky', [App\Http\Controllers\HomeController::class, 'all'])->name('all');
Route::get('/view-task/{id}', [TaskController::class, 'view_task'])->name('view');
Route::post('/send-task', [TaskController::class, 'send_task'])->name('send');
Route::get('/myearnings',[TaskController::class,'myearnings'])->name('myearnings');
Route::get('/compeleted-tasks',[TaskController::class,'completed_tasks'])->name('completed-tasks');
Route::post('/resolve-task',[TaskController::class,'resolve_task'])->name('resolve');

Route::get('/task-issue',[TaskController::class,'task_issue'])->name('issue');
Route::get('/payment-method',[TaskController::class,'payment_method'])->name('payment');
Route::post('/add-payment-method',[TaskController::class,'add_payment_method'])->name('add-method');
Route::post('/withdrawal-cash',[TaskController::class,'withdrawal_cash'])->name('withdrawal');

Route::get('/withdrawal-records',[TaskController::class,'withdrawal_records'])->name('withdrawal_records');
Route::get('/resend-request/{id}',[TaskController::class,'resend_request'])->name('resend-request');

Route::get('/card-edit/{id}',[TaskController::class,'card_edit'])->name('card-edit');
Route::post('/card-update',[TaskController::class,'card_update'])->name('card-update');
Route::get('/user_withdrawal_records_with_task_completions',[TaskController::class,'user_withdrawal_records_with_task_completions'])->name('user_withdrawal_records_with_task_completions');

Route::fallback(function () {
    return view('pagenotfound'); 
});
});

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admsssin', [App\Http\Controllers\HomeController::class, 'admin'])->name('transactions');
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
    Route::get('/add-task', [TaskController::class, 'add_task'])->name('add');
    // Route::get('/admin-expense',[TaskController::class,'admin_expense'])->name('expense');

    Route::post('/upload-task',[TaskController::class,'upload_task'])->name('uploadtask');
    Route::get('/edit-task/{id}',[TaskController::class,'edit_task'])->name('edit');
    Route::post('/update-task',[TaskController::class,'update_task'])->name('update');
    Route::post('/delete-task',[TaskController::class,'delete_task'])->name('delete');
    Route::get('/resume-task/{id}',[TaskController::class,'resume_task'])->name('resume');
    Route::get('/pause-task/{id}',[TaskController::class,'pause_task'])->name('pause');
    Route::get('/find-task-completion/{id}',[TaskController::class,'find_task_completion'])->name('find-task-completion');
    Route::get('/find-user/{id}',[TaskController::class,'find_user'])->name('find-user');
    Route::get('/withdrawal-request/{id}',[TaskController::class,'withdrawal_request'])->name('withdrawal-request');
    Route::get('/review-user-withdrawal/{id}',[TaskController::class,'review_user_withdrawal'])->name('review-user-withdrawal');
    Route::get('/tasks',[TaskController::class,'show_tasks'])->name('tasks');
    Route::get('/tasky-users',[TaskController::class,'tasky_users'])->name('tasky-users');
    Route::get('/Withdrawals',[TaskController::class,'Withdrawals'])->name('Withdrawals');

    Route::get('/role-admin/{id}',[TaskController::class,'role_admin'])->name('role-admin');
    Route::get('/role-user/{id}',[TaskController::class,'role_user'])->name('role-user');

    Route::get('/restriction-unbann/{id}',[TaskController::class,'restriction_unbann'])->name('restriction-unbann');
    Route::get('/restriction-bann/{id}',[TaskController::class,'restriction_bann'])->name('restriction-bann');

    Route::get('/review-tasks',[TaskController::class,'review_tasks'])->name('review');
    Route::get('/view-image',function () {
        return view('view-image');
    })->name('view-image');
    Route::post('/task-approved',[TaskController::class,'task_approved'])->name('approved');
    Route::post('/task-rejected',[TaskController::class,'task_rejected'])->name('rejected');

    Route::post('/Withdrawal-done',[TaskController::class,'Withdrawal_done'])->name('Withdrawal-done');
    Route::post('/Withdrawal-issue',[TaskController::class,'Withdrawal_issue'])->name('Withdrawal-issue');

    Route::get('/contact-us',[TaskController::class,'contactus'])->name('contact-us');

    // Route::fallback(function () {
    //     return view('pagenotfound'); 
    // });
});