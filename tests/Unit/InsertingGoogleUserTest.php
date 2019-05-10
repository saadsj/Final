<?php
namespace Tests\Unit;
use Tests\TestCase;
use App\User;

class InsertingGoogleUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInsertingGoogleUser()
    {
        $user = factory(\App\User::class)->make();
        $user->google_id = "qwert123";
        $user->avatar = "https://lh3.googleusercontent.com/-B7VKKQzPX1A/AAAAAAAAAAI/AAAAAAAAAAA/AGDgw-g_g5fU_QdUBm7MU5FWq8JUp0-Bbg/mo/photo.jpg?sz=50";
        $user->avatar_original = "https://lh3.googleusercontent.com/-B7VKKQzPX1A/AAAAAAAAAAI/AAAAAAAAAAA/AGDgw-g_g5fU_QdUBm7MU5FWq8JUp0-Bbg/mo/photo.jpg?sz=50";
        $user->save();
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }
}
