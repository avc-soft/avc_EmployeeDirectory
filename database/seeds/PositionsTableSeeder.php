<?php

use Illuminate\Database\Seeder;

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
            ],
            [
                'name' => 'Vice President',
            ],
            [
                'name' => 'Division Director',
            ],
            [
                'name' => 'Head of Department',
            ],
            [
                'name' => 'Team Lead',
            ],
            [
                'name' => 'Common Employee',
            ],
        ]);
    }
}
