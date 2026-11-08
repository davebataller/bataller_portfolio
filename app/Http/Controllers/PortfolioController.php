<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    /**
     * Display the single-page portfolio.
     */
    public function index(): View
    {
        return view('portfolio.index', [
            'portfolio' => config('portfolio'),
        ]);
    }

    /**
     * Display the portfolio project dashboard.
     */
    public function dashboard(): View
    {
        return view('portfolio.dashboard', [
            'portfolio' => config('portfolio'),
        ]);
    }
}
