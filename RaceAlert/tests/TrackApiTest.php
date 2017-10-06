<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrackApiTest extends TestCase
{
    use MakeTrackTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTrack()
    {
        $track = $this->fakeTrackData();
        $this->json('POST', '/api/v1/tracks', $track);

        $this->assertApiResponse($track);
    }

    /**
     * @test
     */
    public function testReadTrack()
    {
        $track = $this->makeTrack();
        $this->json('GET', '/api/v1/tracks/'.$track->id);

        $this->assertApiResponse($track->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTrack()
    {
        $track = $this->makeTrack();
        $editedTrack = $this->fakeTrackData();

        $this->json('PUT', '/api/v1/tracks/'.$track->id, $editedTrack);

        $this->assertApiResponse($editedTrack);
    }

    /**
     * @test
     */
    public function testDeleteTrack()
    {
        $track = $this->makeTrack();
        $this->json('DELETE', '/api/v1/tracks/'.$track->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tracks/'.$track->id);

        $this->assertResponseStatus(404);
    }
}
