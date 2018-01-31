<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RoutingTest extends TestCase
{
    //use DatabaseMigrations;

    /** @test */
    public function guest_can_see_home_page()
    {
        $this->get('/')
            ->assertStatus(200);
    }

    /** @test */
    function guest_cannot_see_restricted_area()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->get('/employees');
    }

}
