<?php

use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Api\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Api\Admin\TeamMemberController as AdminTeamMemberController;
use App\Http\Controllers\Api\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Api\Admin\DashboardController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\TeamMemberController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

// Public APIs
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/team-members', [TeamMemberController::class, 'index']);
Route::get('/faqs', [FaqController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);

// Protected
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/logout', [AuthController::class, 'logout']);
    Route::get('/admin/me', [AuthController::class, 'me']);
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    // Products
    Route::apiResource('/admin/products', AdminProductController::class);
    Route::delete('/admin/products/images/{imageId}', [AdminProductController::class, 'deleteImage']);

    // Team Members
    Route::apiResource('/admin/team-members', AdminTeamMemberController::class);
    Route::post('/admin/team-members/{id}/update', [AdminTeamMemberController::class, 'update']);

    // FAQs
    Route::apiResource('/admin/faqs', AdminFaqController::class);

    // Contacts
    Route::get('/admin/contacts', [AdminContactController::class, 'index']);
    Route::get('/admin/contacts/{id}', [AdminContactController::class, 'show']);
    Route::delete('/admin/contacts/{id}', [AdminContactController::class, 'destroy']);
});
