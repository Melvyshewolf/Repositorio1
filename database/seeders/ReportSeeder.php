<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reports = Report::factory(10)->create();

        foreach ($reports as $report) {
            Photo::factory(1)->create([
                'photoable_id' => $report->id,
                'photoable_type' => Report::class 
            ]);
                $report->tags()->attach(rand(1,5));
                
   
        }
    }
}
