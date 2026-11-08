<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/dashboard', [PortfolioController::class, 'dashboard'])->name('dashboard');

// Deployment health check for Vercel and other platforms.
// Laravel's built-in /up route also exists; this endpoint returns a small
// JSON payload so smoke tests can verify the app is serving traffic.
Route::get('/health', function (): JsonResponse {
    return response()->json(['status' => 'ok', 'app' => config('app.name')]);
})->name('health');
