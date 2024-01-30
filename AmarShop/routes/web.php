<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;

Route::get('/',[HomeController::class,'HomePage']);
Route::get('/dashboard', [DashboardController::class, 'DashboardPage']);

//user
Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/user-login', [UserController::class, 'UserLogin']);
Route::get('/user-profile', [UserController::class, 'UserProfile'])->middleware('auth:sanctum');
Route::get('/user-logout', [UserController::class, 'UserLogout'])->middleware('auth:sanctum');
Route::post('/user-update', [UserController::class, 'UpdateProfile'])->middleware('auth:sanctum');
Route::post('/send-otp', [UserController::class, 'SendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'VerifyOTP']);
Route::post('/reset-password', [UserController::class, 'ResetPassword'])->middleware('auth:sanctum');



//Category Api Routes
Route::post('/category-create', [CategoryController::class, 'CategoryCreate'])->middleware('auth:sanctum');
Route::post('/category-update', [CategoryController::class, 'CategoryUpdate'])->middleware('auth:sanctum');
Route::post('/category-delete', [CategoryController::class, 'CategoryDelete'])->middleware('auth:sanctum');
Route::post('/category-by-id', [CategoryController::class, 'CategoryByID'])->middleware('auth:sanctum');
Route::get('/list-category', [CategoryController::class, 'CategoryList'])->middleware('auth:sanctum');

// Customer Web API Routes
Route::post("/customer-create", [CustomerController::class, 'CustomerCreate'])->middleware('auth:sanctum');
Route::get("/customer-list", [CustomerController::class, 'CustomerList'])->middleware('auth:sanctum');
Route::post("/customer-delete", [CustomerController::class, 'CustomerDelete'])->middleware('auth:sanctum');
Route::post("/customer-update", [CustomerController::class, 'CustomerUpdate'])->middleware('auth:sanctum');
Route::post("/customer-by-id", [CustomerController::class, 'CustomerByID'])->middleware('auth:sanctum');



// Product Web API Routes
Route::post("/product-create", [ProductController::class, 'CreateProduct'])->middleware('auth:sanctum');
Route::post("/product-delete", [ProductController::class, 'DeleteProduct'])->middleware('auth:sanctum');
Route::post("/product-update", [ProductController::class, 'UpdateProduct'])->middleware('auth:sanctum');
Route::get("/product-list", [ProductController::class, 'ProductList'])->middleware('auth:sanctum');
Route::post("/product-by-id", [ProductController::class, 'ProductByID'])->middleware('auth:sanctum');

// Invoice
Route::post("/invoice-create", [InvoiceController::class, 'invoiceCreate'])->middleware('auth:sanctum');
Route::get("/invoice-select", [InvoiceController::class, 'invoiceSelect'])->middleware('auth:sanctum');
Route::post("/invoice-details", [InvoiceController::class, 'InvoiceDetails'])->middleware('auth:sanctum');
Route::post("/invoice-delete", [InvoiceController::class, 'invoiceDelete'])->middleware('auth:sanctum');


// Report
Route::get("/sales-report/{FormDate}/{ToDate}", [ReportController::class, 'SalesReport'])->middleware('auth:sanctum');



//Page Route

Route::view('/userLogin', 'pages.auth.login-page')->name('login');
Route::view('/userRegistration', 'pages.auth.registration-page');
Route::view('/sendOtp', 'pages.auth.send-otp-page');
Route::view('/verifyOtp', 'pages.auth.verify-otp-page');
Route::view('/resetPassword', 'pages.auth.reset-pass-page');
Route::view('/userProfile', 'pages.dashboard.profile-page');


Route::view('/categoryPage', 'pages.dashboard.category-page');
Route::view('/customerPage', 'pages.dashboard.customer-page');
Route::view('/productPage', 'pages.dashboard.product-page');

Route::view('/invoicePage', 'pages.dashboard.invoice-page');
Route::view('/salePage', 'pages.dashboard.sale-page');
Route::view('/reportPage', 'pages.dashboard.report-page');
// Route::view('/dashboard', 'pages.dashboard.dashboard-page');


// SUMMARY & Report
Route::get("/summary", [DashboardController::class, 'Summary'])->middleware('auth:sanctum');
Route::get("/sales-report/{FormDate}/{ToDate}", [ReportController::class, 'SalesReport'])->middleware('auth:sanctum');

//
