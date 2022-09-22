<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Proizvod;
use App\Models\Proizvodjac;
use App\Models\Tip;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Tip::truncate();
        Proizvodjac::truncate();
        Proizvod::truncate();
        Proizvod::factory(5)->create();
         //\App\Models\User::factory(10)->create();

    }
}
