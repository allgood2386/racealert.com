<?php

use Faker\Factory as Faker;
use App\Models\TrackConfiguration;
use App\Repositories\TrackConfigurationRepository;

trait MakeTrackConfigurationTrait
{
    /**
     * Create fake instance of TrackConfiguration and save it in database
     *
     * @param array $trackConfigurationFields
     * @return TrackConfiguration
     */
    public function makeTrackConfiguration($trackConfigurationFields = [])
    {
        /** @var TrackConfigurationRepository $trackConfigurationRepo */
        $trackConfigurationRepo = App::make(TrackConfigurationRepository::class);
        $theme = $this->fakeTrackConfigurationData($trackConfigurationFields);
        return $trackConfigurationRepo->create($theme);
    }

    /**
     * Get fake instance of TrackConfiguration
     *
     * @param array $trackConfigurationFields
     * @return TrackConfiguration
     */
    public function fakeTrackConfiguration($trackConfigurationFields = [])
    {
        return new TrackConfiguration($this->fakeTrackConfigurationData($trackConfigurationFields));
    }

    /**
     * Get fake data of TrackConfiguration
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTrackConfigurationData($trackConfigurationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->text,
            'description' => $fake->word,
            'length' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $trackConfigurationFields);
    }
}
