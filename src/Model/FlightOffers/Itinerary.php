<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class Itinerary extends FromArrayModelBase
{
    /**
     * @var string
     */
    protected $duration;

    /**
     * @var Segment[]
     */
    protected $segments;

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

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return Segment[]
     */
    public function getSegments()
    {
        return $this->segments;
    }
}
