<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            [
                'name' => 'President',
                'weight' => 0
            ],
            [
                'name' => 'Vice President',
                'weight' => 10
            ],
            [
                'name' => 'Division Director',
                'weight' => 20
            ],
            [
                'name' => 'Head of Department',
                'weight' => 30
            ],
            [
                'name' => 'Team Lead',
                'weight' => 40
            ],
            [
                'name' => 'Common Employee',
                'weight' => 50
            ],
        ]);
    }
}
