<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Geolocation;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('reports');
        Storage::makeDirectory('reports');

        // \App\Models\User::factory(10)->create();
        
        $this->call(RoleSeeder::class);
        Event::factory(5)->create();
        $this->call(UserSeeder::class);
        Tag::factory(10)->create();
         $this->call(ReportSeeder::class);
    }
}
