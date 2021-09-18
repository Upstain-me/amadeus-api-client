<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\Tests\Unit;

use Codeception\Test\Unit;
use Upstain\AmadeusApiClient\V2\Air\Model\FlightOffersSearchResponse;

class FlightOfferTest extends Unit
{
    public function testUnit()
    {
        $response = $this->getJson('flightOffersSearch/response.json');

        $transformedResponse = new FlightOffersSearchResponse($response['data']);
        $test = 0;
    }

    /**
     * @param string $relativePath
     *   Relative path to the _data folder.
     * @return mixed
     * @throws \JsonException
     */
    private function getJson(string $relativePath)
    {
        return \json_decode(
            \file_get_contents(__DIR__ . '/../_data/' . $relativePath),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
