<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/success/{id}', [InvoiceController::class, 'successPage'])->name('successPage');
Route::get('/cancel', [InvoiceController::class, 'cancelPage'])->name('cancelPage');

Route::get('/download-invoice/{id}', [InvoiceController::class, 'downloadInvoice'])->name('downloadInvoice');
Route::get('/invoices/payment/{id}', [InvoiceController::class, 'payment'])->name('invoice.payment');

Route::post('/invoices/payment', [InvoiceController::class, 'stripePost'])->name('stripe.post');
Route::get('/404/expired', [InvoiceController::class, 'expire'])->name('page.expired');

Route::get('/invoices/success', [InvoiceController::class, 'success'])->name('invoice.success');
Route::post('/get-customer-data', [InvoiceController::class, 'getCustomerData'])->name('get.customer.data');
Route::post('/profile-update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'userPage'])->name('admin.users');
    Route::get('/admin/add-user', [AdminController::class, 'addUser'])->name('admin.add-users');
    Route::post('/admin/add-user', [AdminController::class, 'storeUser'])->name('admin.user.store');
    Route::post('/admin/user-delete', [AdminController::class, 'delete'])->name('admin.user.delete');
    Route::get('/admin/edit-user/{id}', [AdminController::class, 'editUser'])->name('admin.edit-user');
    Route::post('/admin/edit-user', [AdminController::class, 'updateUser'])->name('admin.user.update');
    Route::get('/admin/profile', [AdminController::class, 'profilePage'])->name('admin.profile');
   
    Route::get('/admin/customers', [AdminController::class, 'customer'])->name('admin.customer');
    Route::get('/admin/add-customer', [AdminController::class, 'addCustomer'])->name('admin.add-customer');
    Route::post('/admin/add-customer', [AdminController::class, 'storeCustomer'])->name('admin.customer.store');
    Route::post('/admin/customer-delete', [AdminController::class, 'deleteCustomer'])->name('admin.customer.delete');
    Route::get('/admin/edit-customer/{id}', [AdminController::class, 'editCustomer'])->name('admin.edit-customer');
    Route::post('/admin/edit-customer', [AdminController::class, 'updateCustomer'])->name('admin.customer.update');
    Route::get('/admin/customer-view/{id}', [AdminController::class, 'viewCustomer'])->name('admin.customer.view');

    Route::get('/admin/invoices', [AdminController::class, 'invoicePage'])->name('admin.invoice');
    Route::get('/admin/add/invoices', [AdminController::class, 'addInvoice'])->name('admin.addInvoice');
});

Route::group(['middleware' => 'user'], function () {
Route::get('/user/index', [UserController::class, 'index'])->name('user.index');

Route::get('/user/invoices', [UserController::class, 'invoicePage'])->name('user.invoice');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('/user/add/invoices', [UserController::class, 'addInvoice'])->name('user.addInvoice');
Route::get('/user/customers', [UserController::class, 'customer'])->name('user.customer');
Route::get('/user/add-customer', [UserController::class, 'addCustomer'])->name('user.add-customer');
Route::post('/user/add-customer', [UserController::class, 'storeCustomer'])->name('user.customer.store');
Route::post('/user/customer-delete', [UserController::class, 'deleteCustomer'])->name('user.customer.delete');
Route::get('/user/edit-customer/{id}', [UserController::class, 'editCustomer'])->name('user.edit-customer');
Route::post('/user/edit-customer', [UserController::class, 'updateCustomer'])->name('user.customer.update');
Route::get('/user/customer-view/{id}', [UserController::class, 'viewCustomer'])->name('user.customer.view');



Route::get('/user/users', [UserController::class, 'userPage'])->name('user.users');
Route::get('/user/add-user', [UserController::class, 'addUser'])->name('user.add-users');
Route::post('/user/add-user', [UserController::class, 'storeUser'])->name('user.user.store');
Route::post('/user/user-delete', [UserController::class, 'delete'])->name('user.user.delete');
Route::get('/user/edit-user/{id}', [UserController::class, 'editUser'])->name('user.edit-user');
Route::post('/user/edit-user', [UserController::class, 'updateUser'])->name('user.user.update');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/customer-transfer/{id}', [UserController::class, 'transferCustomer'])->name('user.customer.transfer');
Route::get('CreateInvoice', [InvoiceController::class, 'index'])->name('invoice.create');
Route::post('/invoices', [InvoiceController::class, 'create'])->name('invoice.store');
Route::get('/invoices-created/{id}', [InvoiceController::class, 'show'])->name('invoice.show');

Route::get('admin/invoices-created/{id}', [InvoiceController::class, 'showAdmin'])->name('admin.invoice.show');
Route::get('user/invoices-created/{id}', [InvoiceController::class, 'showUser'])->name('user.invoice.show');


Route::get('/invoices/cancel', [InvoiceController::class, 'cancel'])->name('invoice.cancel');

Route::post('/invoices/payment/auto', [InvoiceController::class, 'chargeCustomerAgain'])->name('stripe.payment');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/invoices/{id}/payment-link', [InvoiceController::class, 'showPaymentLink'])->name('invoice.showPaymentLink');
require __DIR__ . '/auth.php';
