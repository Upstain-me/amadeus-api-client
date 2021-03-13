<?php

namespace Upstain\AmadeusApiClient;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\SimpleCache\CacheInterface;
use Psr\SimpleCache\InvalidArgumentException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Upstain\AmadeusApiClient\Exception\AmadeusException;
use Upstain\AmadeusApiClient\Exception\ExceptionCode;

class Client implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    public const AMADEUS_AUTH_CACHE = 'amadeus_auth_cache';

    /**
     * @var Configuration
     */
    private Configuration $configuration;

    /**
     * @var CacheInterface
     */
    private CacheInterface $cache;

    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $httpClient;

    /**
     * @param Configuration $configuration
     * @param CacheInterface $cache
     * @param HttpClientInterface $httpClient
     */
    public function __construct(Configuration $configuration, CacheInterface $cache, HttpClientInterface $httpClient)
    {
        $this->configuration = $configuration;
        $this->cache = $cache;
        $this->httpClient = $httpClient;
    }

    /**
     * @return AuthenticatedClient
     *
     * @throws AmadeusException
     */
    public function authenticate(): AuthenticatedClient
    {
        $cacheKey = self::AMADEUS_AUTH_CACHE.'_'.$this->getConfiguration()->getClientId();
        $response = null;

        try {
            $response = $this->cache->get($cacheKey);
        } catch (InvalidArgumentException $e) {
            $this->logger->error('Amadeus cache get error: ' . $e->getMessage());
        }

        if ($response === null) {
            $response = $this->auth();

            try {
                $this->cache->set($cacheKey, $response);
            } catch (InvalidArgumentException $e) {
                $this->logger->error('Amadeus cache set error: ' . $e->getMessage());
            }
        }

        return new AuthenticatedClient(
            $this->getConfiguration(),
            $this->cache,
            $this->httpClient,
            $response['expires_in'],
            $response['token_type'],
            $response['access_token'],
        );
    }

    /**
     * @return Configuration
     */
    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    /**
     * @return array<string, mixed>
     *
     * @throws AmadeusException
     */
    protected function auth(): array
    {
        try {
            $response = $this->httpClient->request(
                'POST',
                $this->getConfiguration()->getBaseUrl() . '/v1/security/oauth2/token',
                [
                    'body' => [
                        'grant_type' => 'client_credentials',
                        'client_id' => $this->getConfiguration()->getClientId(),
                        'client_secret' => $this->getConfiguration()->getClientSecret(),
                    ],
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                    ],
                ],
            );

            return $response->toArray();
        } catch (ClientExceptionInterface |
            DecodingExceptionInterface |
            RedirectionExceptionInterface |
            ServerExceptionInterface |
            TransportExceptionInterface $e
        ) {
            $exceptionCode = (string) new ExceptionCode(ExceptionCode::AUTH, $e->getCode());
            $context = [
                'baseUrl' => $this->getConfiguration()->getBaseUrl(),
                'client_id' => $this->getConfiguration()->getClientId()
            ];
            $this->logger->error($exceptionCode . ': ' . $e->getMessage(), $context);

            throw AmadeusException::authError($e);
        }
    }

    /**
     * @return HttpClientInterface
     */
    public function getHttpClient(): HttpClientInterface
    {
        return $this->httpClient;
    }
}
