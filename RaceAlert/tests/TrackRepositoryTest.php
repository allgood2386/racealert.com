<?php

use App\Models\Track;
use App\Repositories\TrackRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrackRepositoryTest extends TestCase
{
    use MakeTrackTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TrackRepository
     */
    protected $trackRepo;

    public function setUp()
    {
        parent::setUp();
        $this->trackRepo = App::make(TrackRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTrack()
    {
        $track = $this->fakeTrackData();
        $createdTrack = $this->trackRepo->create($track);
        $createdTrack = $createdTrack->toArray();
        $this->assertArrayHasKey('id', $createdTrack);
        $this->assertNotNull($createdTrack['id'], 'Created Track must have id specified');
        $this->assertNotNull(Track::find($createdTrack['id']), 'Track with given id must be in DB');
        $this->assertModelData($track, $createdTrack);
    }

    /**
     * @test read
     */
    public function testReadTrack()
    {
        $track = $this->makeTrack();
        $dbTrack = $this->trackRepo->find($track->id);
        $dbTrack = $dbTrack->toArray();
        $this->assertModelData($track->toArray(), $dbTrack);
    }

    /**
     * @test update
     */
    public function testUpdateTrack()
    {
        $track = $this->makeTrack();
        $fakeTrack = $this->fakeTrackData();
        $updatedTrack = $this->trackRepo->update($fakeTrack, $track->id);
        $this->assertModelData($fakeTrack, $updatedTrack->toArray());
        $dbTrack = $this->trackRepo->find($track->id);
        $this->assertModelData($fakeTrack, $dbTrack->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTrack()
    {
        $track = $this->makeTrack();
        $resp = $this->trackRepo->delete($track->id);
        $this->assertTrue($resp);
        $this->assertNull(Track::find($track->id), 'Track should not exist in DB');
    }
}
