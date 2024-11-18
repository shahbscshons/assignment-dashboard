<?php

namespace App\Console\Commands;

use App\Models\Analytics;
use Illuminate\Console\Command;

class JsonImport extends Command
{
    protected $signature = 'json:import';
    protected $description = 'Import data from JSON files into the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $files = [
            'google_analytics.json',
            'microsoft_clarity.json',
            'facebook.json',
            'instagram.json',
            'snapchat.json',
        ];

        foreach ($files as $filename) {
            $filePath = storage_path("app/public/json/{$filename}");

            if (!file_exists($filePath)) {
                $this->error("File not found: $filePath");
                continue;
            }

            $data = json_decode(file_get_contents($filePath), true);

            if (!$data) {
                $this->error("Invalid JSON format in: $filePath");
                continue;
            }

            foreach ($data as $metric) {
                Analytics::create([
                    'platform'   => $metric['platform'],
                    'metric_name'=> $metric['metric_name'],
                    'value'      => $metric['value'],
                    'date'       => $metric['date'],
                ]);
            }

            $this->info("Data imported successfully from: $filePath");
        }

        return 0;
    }
}
