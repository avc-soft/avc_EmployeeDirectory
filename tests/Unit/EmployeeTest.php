<?php

namespace Tests\Unit;

use App\Employee;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDeleteAnEmployee()
    {
        $topBoss = create(Employee::class);

        $midBoss1 = create(Employee::class, ['boss_id' => $topBoss->id]);
        $midBoss2 = create(Employee::class, ['boss_id' => $topBoss->id]);

        create(Employee::class, ['boss_id' => $midBoss1->id], 2);
        create(Employee::class, ['boss_id' => $midBoss2->id], 2);

        $this->assertEquals(2, $topBoss->children()->count());

        $midBoss2->delete();

        $this->assertDatabaseMissing('employees', $midBoss2->toArray());

        $this->assertEquals(2, $midBoss1->children()->count());
        $this->assertEquals(3, $topBoss->children()->count());
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateAnEmployee()
    {
        $this->signIn();

        $employee = [
            'name' => 'John Smith',
            'position_id' => 1,
            'salary' => 0,
            'boss_id' => 0
        ];

        $this->post('/employees', $employee);

        $this->assertDatabaseHas('employees', $employee);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateAnEmployee()
    {
        $this->signIn();

        $employee = create(Employee::class);

        $newData = [
            'name' => 'John Smith',
            'position_id' => 1,
            'salary' => 0,
            'boss_id' => 0
        ];

        $this->patch("/employees/$employee->id", $newData);

        $this->assertDatabaseMissing('employees', $employee->toArray());
        $this->assertDatabaseHas('employees', $newData);
    }
}
