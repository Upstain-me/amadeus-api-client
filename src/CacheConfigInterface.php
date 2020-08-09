<?php

namespace Upstain\AmadeusApiClient;

use Symfony\Contracts\Cache\CacheInterface;

interface CacheConfigInterface
{
    /**
     * @return CacheKeyGeneratorInterface
     */
    public function getCacheKeyGenerator(): CacheKeyGeneratorInterface;

    /**
     * @return CacheInterface
     */
    public function getCache(): CacheInterface;
}
