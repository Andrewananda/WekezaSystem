<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MembersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response
            ->assertStatus(302);
    }

    public function testSingleMember() {
        $response = $this->json('GET','/api/member/2');

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'name'=>'Brian Ingolo'
            ]);
    }
}
