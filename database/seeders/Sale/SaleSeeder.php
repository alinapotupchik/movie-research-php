<?php declare(strict_types=1);

namespace Database\Seeders\Sale;

use App\Models\Movie\Movie;
use App\Models\Theater\Theater;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        $theaters = Theater::all();
        $movies = Movie::all();

        $startDate = Carbon::create(2024, 11, 1);
        $endDate = Carbon::create(2024, 11, 30);

        $salesData = [];

        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $timestamp = $date->timestamp;

            foreach ($theaters as $theater) {
                foreach ($movies as $movie) {
                    $salesData[] = [
                        'theater_id' => $theater->id,
                        'movie_id' => $movie->id,
                        'sold_at' => $timestamp,
                        'amount' => rand(100, 300),
                        'created_at' => Carbon::now()->timestamp,
                        'updated_at' => Carbon::now()->timestamp,
                    ];
                }
            }
        }

        DB::table('sales')->insert($salesData);
    }
}
