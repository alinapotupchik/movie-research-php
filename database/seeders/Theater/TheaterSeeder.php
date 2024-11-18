<?php declare(strict_types=1);

namespace Database\Seeders\Theater;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TheaterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('theaters')->insert([
            [
                'name' => 'Grand Cinema',
                'location' => 'Downtown',
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
            ],
            [
                'name' => 'Star Theater',
                'location' => 'Uptown',
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
            ],
            [
                'name' => 'Galaxy Movies',
                'location' => 'Midtown',
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
            ],
        ]);
    }
}
