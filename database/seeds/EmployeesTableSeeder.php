<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: проверить работает ли так быстрее
        DB::disableQueryLog();

        // TODO: Исправить 55к инсертов на один и переделать забор во что-то менее постыдное
        // TODO: Upd.: при одном инсерте отваливается по памяти, что неудивительно. Подумать что-то еще.
        factory(Employee::class)
            ->create(['position_id' => 1])
            ->each(function ($boss) {$this->createSeed($boss, 2, 5)
                ->each(function ($boss) {$this->createSeed($boss, 3,10)
                    ->each(function ($boss) {$this->createSeed($boss, 4, 10)
                        ->each(function ($boss) {$this->createSeed($boss, 5, 10)
                            ->each(function ($boss) {$this->createSeed($boss, 6, 10);
                            });
                        });
                    });
                });
            });
    }

    /**
     * @param Employee $boss
     * @param int $position_id
     * @param int $times
     *
     * @return Employee
     */
    private function createSeed(Employee $boss, int $position_id, int $times)
    {
        return factory(Employee::class, $times)
            ->create([
                'boss_id' => $boss->id,
                'position_id' => $position_id
            ]);
    }

    /*private function prepareData()
    {
        return array_merge(
            factory(App\User::class)
                ->make(['position_id' => 1])
                ->asArray(),
        );
    }*/
}
