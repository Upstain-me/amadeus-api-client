<?php

namespace Upstain\AmadeusApiClient;

interface CacheKeyGeneratorInterface
{
    /**
     * @return string
     */
    public function generate(): string;
}
