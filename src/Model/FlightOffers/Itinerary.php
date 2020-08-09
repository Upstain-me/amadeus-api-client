<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class Itinerary
 *
 * @method string getDuration()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\Segment[] getSegments()
 */
class Itinerary extends FromArrayModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $duration;

    /**
     * @var Segment[]
     * @Getter
     */
    protected array $segments;

    /**
     * @param mixed $data
     */
    public function __construct($data)
    {
        $excludedProperties = [
            'segments'
        ];
        parent::__construct($data, $excludedProperties);

        if ($data['segments']) {
            foreach ($data['segments'] as $segment) {
                $this->segments[] = new Segment($segment);
            }
        }
    }
}
