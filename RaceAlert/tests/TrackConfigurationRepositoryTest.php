<?php

use App\Models\TrackConfiguration;
use App\Repositories\TrackConfigurationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrackConfigurationRepositoryTest extends TestCase
{
    use MakeTrackConfigurationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TrackConfigurationRepository
     */
    protected $trackConfigurationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->trackConfigurationRepo = App::make(TrackConfigurationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTrackConfiguration()
    {
        $trackConfiguration = $this->fakeTrackConfigurationData();
        $createdTrackConfiguration = $this->trackConfigurationRepo->create($trackConfiguration);
        $createdTrackConfiguration = $createdTrackConfiguration->toArray();
        $this->assertArrayHasKey('id', $createdTrackConfiguration);
        $this->assertNotNull($createdTrackConfiguration['id'], 'Created TrackConfiguration must have id specified');
        $this->assertNotNull(TrackConfiguration::find($createdTrackConfiguration['id']), 'TrackConfiguration with given id must be in DB');
        $this->assertModelData($trackConfiguration, $createdTrackConfiguration);
    }

    /**
     * @test read
     */
    public function testReadTrackConfiguration()
    {
        $trackConfiguration = $this->makeTrackConfiguration();
        $dbTrackConfiguration = $this->trackConfigurationRepo->find($trackConfiguration->id);
        $dbTrackConfiguration = $dbTrackConfiguration->toArray();
        $this->assertModelData($trackConfiguration->toArray(), $dbTrackConfiguration);
    }

    /**
     * @test update
     */
    public function testUpdateTrackConfiguration()
    {
        $trackConfiguration = $this->makeTrackConfiguration();
        $fakeTrackConfiguration = $this->fakeTrackConfigurationData();
        $updatedTrackConfiguration = $this->trackConfigurationRepo->update($fakeTrackConfiguration, $trackConfiguration->id);
        $this->assertModelData($fakeTrackConfiguration, $updatedTrackConfiguration->toArray());
        $dbTrackConfiguration = $this->trackConfigurationRepo->find($trackConfiguration->id);
        $this->assertModelData($fakeTrackConfiguration, $dbTrackConfiguration->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTrackConfiguration()
    {
        $trackConfiguration = $this->makeTrackConfiguration();
        $resp = $this->trackConfigurationRepo->delete($trackConfiguration->id);
        $this->assertTrue($resp);
        $this->assertNull(TrackConfiguration::find($trackConfiguration->id), 'TrackConfiguration should not exist in DB');
    }
}
