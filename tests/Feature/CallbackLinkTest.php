<?php
namespace Tests\Feature;
use Tests\TestCase;
class CallbackLinkTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCallbackLink()
    {
        $response = $this->get('/callback');
        $response->assertStatus(302);
    }
}
