<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\User;

class InsertingRegularUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInsertingRegularUser()
    {
        $user = factory(\App\User::class)->make();
        $user->save();
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }
}
