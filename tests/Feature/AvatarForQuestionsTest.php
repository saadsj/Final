<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\User;

class AvatarForQuestionsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAvatarForQuestions()
    {
        $user = User::whereNotNull('google_id')->first();
        $questionId = $user->questions()->first()->id;
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/questions/' . $questionId)
            ->assertSee($user->avatar); // google avatar

    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNoGoogleAvatarForQuestions()
    {
        $user = User::whereNull('google_id')->first();
        $questionId = $user->questions()->first()->id;
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/questions/' . $questionId)
            ->assertSee("https://www.logolynx.com/images/logolynx/d4/d4a80a1f2a0d79a8783d2910f69680cf.png"); // default avatar

    }
}
