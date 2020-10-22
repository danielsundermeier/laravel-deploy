<?php

namespace D15r\Deployment\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use D15r\Deployment\Tests\TestCase;

class DeploymentControllerTest extends TestCase
{
    /**
     * @test
     */
    public function the_application_can_be_deployed()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/deploy');
        $response->assertStatus(200);
    }
}
