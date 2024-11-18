<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $analyticsData = Analytics::all();
        return view('dashboard', compact('analyticsData'));
    }
}
