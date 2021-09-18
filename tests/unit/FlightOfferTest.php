<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\Tests\Unit;

use Codeception\Test\Unit;
use Upstain\AmadeusApiClient\V2\Air\Model\FlightOffersSearchResponse;

class FlightOfferTest extends Unit
{
    public function testUnit(): void
    {
        $response = $this->getJson('flightOffersSearch/response.json');

        $transformedResponse = new FlightOffersSearchResponse($response['data']);
        self::assertCount(250, $transformedResponse->data);
    }

    /**
     * @param string $relativePath
     *   Relative path to the _data folder.
     * @return array
     * @throws \JsonException
     */
    private function getJson(string $relativePath): array
    {
        return \json_decode(
            \file_get_contents(__DIR__ . '/../_data/' . $relativePath),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
