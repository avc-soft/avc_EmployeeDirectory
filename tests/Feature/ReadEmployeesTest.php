<?php

namespace Tests\Feature;

use App\Employee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadEmployeesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_see_employees_grid()
    {
        $this->signIn();
        create(Employee::class);

        $response = $this->get('/employees')->json();

        $this->assertCount(1, $response['data']);
    }


}
