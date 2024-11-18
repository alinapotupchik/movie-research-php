<?php declare(strict_types=1);

namespace Database\Seeders\Movie;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'title' => 'The Great Adventure',
                'genre' => 'Action',
                'released_at' => Carbon::now()->timestamp,
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
            ],
            [
                'title' => 'Love in Paris',
                'genre' => 'Romance',
                'released_at' => Carbon::now()->timestamp,
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
            ],
            [
                'title' => 'Mystery Island',
                'genre' => 'Thriller',
                'released_at' => Carbon::now()->timestamp,
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
            ],
        ]);
    }
}
