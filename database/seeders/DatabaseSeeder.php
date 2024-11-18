<?php declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Movie\MovieSeeder;
use Database\Seeders\Sale\SaleSeeder;
use Database\Seeders\Theater\TheaterSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            TheaterSeeder::class,
            MovieSeeder::class,
            SaleSeeder::class,
        ]);
    }
}
