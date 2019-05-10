<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\User;

class AvatarForAnswersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAvatarForAnswers()
    {
        $user = User::whereNotNull('google_id')->first();
        $question = $user->questions()->first();
        $questionId = $question->id;
        $answerId = $question->answers()->first()->id;
        print "$questionId  $answerId";
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/questions/' . $questionId . '/answers/' . $answerId)
            ->assertSee($user->avatar); // google avatar

    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNoGoogleAvatarForAnswers()
    {
        $user = User::whereNull('google_id')->first();
        $question = $user->questions()->first();
        $questionId = $question->id;
        $answerId = $question->answers()->first()->id;
        print "$questionId  $answerId";
        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/questions/' . $questionId . '/answers/' . $answerId)
            ->assertSee("https://www.logolynx.com/images/logolynx/d4/d4a80a1f2a0d79a8783d2910f69680cf.png"); // default avatar

    }
}
