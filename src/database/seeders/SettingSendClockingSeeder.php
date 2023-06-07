<?php

namespace Database\Seeders;

use App\Models\SettingSendClocking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSendClockingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingSendClocking::insert([
            SettingSendClocking::ATTR_CHAR_KEY => 'last_clocking_id',
            SettingSendClocking::ATTR_CHAR_VALUE => 1,
        ]);
    }
}
