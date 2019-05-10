<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\User;

class LoginWithGoogleLinkTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGoogleLink()
    {
        $this->get('/')
            ->assertSee("Login with Google");

    }
}
