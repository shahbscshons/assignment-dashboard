<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform',    // e.g., Google Analytics, Facebook
        'metric_name', // Metric like "visits", "page_views"
        'value',       // Metric value (e.g., 1200)
        'date',        // Date of the data (e.g., '2024-11-15')
    ];
}
