<?php

namespace Upstain\AmadeusApiClient;

use Psr\SimpleCache\CacheInterface;
use Upstain\AmadeusApiClient\Shopping\Shopping;

final class AuthenticatedClient extends Client
{
    /**
     * @var string
     */
    private string $expiresIn;

    /**
     * @var string
     */
    private string $tokenType;

    /**
     * @var string
     */
    private string $accessToken;

    /**
     * @param Configuration $configuration
     * @param CacheInterface $cache
     * @param string $expiresIn
     * @param string $tokenType
     * @param string $accessToken
     */
    public function __construct(
        Configuration $configuration,
        CacheInterface $cache,
        string $expiresIn,
        string $tokenType,
        string $accessToken
    ) {
        parent::__construct($configuration, $cache);
        $this->expiresIn = $expiresIn;
        $this->tokenType = $tokenType;
        $this->accessToken = $accessToken;
    }

    public function shopping(): Shopping
    {
        return new Shopping($this);
    }

    /**
     * @return string
     */
    public function getExpiresIn(): string
    {
        return $this->expiresIn;
    }

    /**
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }
}
