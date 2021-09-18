<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class Itinerary
{
    public ?\DateInterval $duration = null;

    /**
     * @var Segment[]
     */
    public array $segments = [];

    public function __construct(array $data)
    {
        if (isset($data['duration'])) {
            try {
                $this->duration = new \DateInterval($data['duration']);
            } catch (\Exception $e) {
            }
        }
        if (isset($data['segments']) && \is_array($data['segments']) && \count($data['segments']) > 0) {
            foreach ($data['segments'] as $segment) {
                $this->segments[] = new Segment($segment);
            }
        }
    }
}
