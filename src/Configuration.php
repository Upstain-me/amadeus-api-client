<?php

namespace Upstain\AmadeusApiClient;

class Configuration
{
    /**
     * @var string
     */
    private string $baseUrl = 'https://test.api.amadeus.com';

    /**
     * @var string
     */
    private string $clientId;

    /**
     * @var string
     */
    private string $clientSecret;

    /**
     * @param string $baseUrl
     * @param string $clientId
     * @param string $clientSecret
     */
    public function __construct(string $baseUrl, string $clientId, string $clientSecret)
    {
        $this->baseUrl = $baseUrl;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }
}
