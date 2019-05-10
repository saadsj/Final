<?php
namespace Tests\Feature;
use Tests\TestCase;
class RedirectLinkTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRedirectLink()
    {
        $response = $this->get('/redirect');
        $response->assertStatus(302);
    }
}
