<?php

use Faker\Factory as Faker;
use App\Models\Track;
use App\Repositories\TrackRepository;

trait MakeTrackTrait
{
    /**
     * Create fake instance of Track and save it in database
     *
     * @param array $trackFields
     * @return Track
     */
    public function makeTrack($trackFields = [])
    {
        /** @var TrackRepository $trackRepo */
        $trackRepo = App::make(TrackRepository::class);
        $theme = $this->fakeTrackData($trackFields);
        return $trackRepo->create($theme);
    }

    /**
     * Get fake instance of Track
     *
     * @param array $trackFields
     * @return Track
     */
    public function fakeTrack($trackFields = [])
    {
        return new Track($this->fakeTrackData($trackFields));
    }

    /**
     * Get fake data of Track
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTrackData($trackFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->text,
            'description' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $trackFields);
    }
}
