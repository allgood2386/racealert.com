<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrackConfigurationApiTest extends TestCase
{
    use MakeTrackConfigurationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTrackConfiguration()
    {
        $trackConfiguration = $this->fakeTrackConfigurationData();
        $this->json('POST', '/api/v1/trackConfigurations', $trackConfiguration);

        $this->assertApiResponse($trackConfiguration);
    }

    /**
     * @test
     */
    public function testReadTrackConfiguration()
    {
        $trackConfiguration = $this->makeTrackConfiguration();
        $this->json('GET', '/api/v1/trackConfigurations/'.$trackConfiguration->id);

        $this->assertApiResponse($trackConfiguration->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTrackConfiguration()
    {
        $trackConfiguration = $this->makeTrackConfiguration();
        $editedTrackConfiguration = $this->fakeTrackConfigurationData();

        $this->json('PUT', '/api/v1/trackConfigurations/'.$trackConfiguration->id, $editedTrackConfiguration);

        $this->assertApiResponse($editedTrackConfiguration);
    }

    /**
     * @test
     */
    public function testDeleteTrackConfiguration()
    {
        $trackConfiguration = $this->makeTrackConfiguration();
        $this->json('DELETE', '/api/v1/trackConfigurations/'.$trackConfiguration->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/trackConfigurations/'.$trackConfiguration->id);

        $this->assertResponseStatus(404);
    }
}
