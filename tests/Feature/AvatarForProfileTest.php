<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\User;

class AvatarForProfileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAvatarForProfile()
    {
        $user = User::whereNotNull('google_id')->first();
        $profileId = $user->profile->id;
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/user/' . $user->id . '/profile/' . $profileId)
            ->assertSee($user->avatar); // google avatar

    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNoGoogleAvatarForProfile()
    {
        $user = User::whereNull('google_id')->first();
        $profileId = $user->profile->id;
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/user/' . $user->id . '/profile/' . $profileId)
            ->assertSee("https://www.logolynx.com/images/logolynx/d4/d4a80a1f2a0d79a8783d2910f69680cf.png"); // default avatar

    }
}
