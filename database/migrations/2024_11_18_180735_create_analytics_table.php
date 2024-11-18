<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyticsTable extends Migration
{
    public function up()
    {
        Schema::create('analytics', function (Blueprint $table) {
            $table->id();
            $table->string('platform');    // e.g., Google Analytics, Microsoft Clarity, etc.
            $table->string('metric_name'); // Metric like "visits", "page_views"
            $table->float('value');        // Metric value (e.g., 1200)
            $table->date('date');          // Date of the metric (e.g., 2024-11-15)
            $table->timestamps();          // Laravel default timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('analytics');
    }
}
