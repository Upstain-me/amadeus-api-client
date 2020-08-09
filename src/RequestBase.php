<?php

namespace Upstain\AmadeusApiClient;

use Psr\Cache\CacheItemInterface;
use Psr\Cache\InvalidArgumentException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Upstain\AmadeusApiClient\Exception\AmadeusException;
use Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightOffersSearchRequest;

abstract class RequestBase
{
    /**
     * @var AuthenticatedClient
     */
    protected AuthenticatedClient $client;

    /**
     * @param AuthenticatedClient $client
     */
    public function __construct(AuthenticatedClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param \Throwable $e
     * @throws AmadeusException
     */
    abstract protected function throwException(\Throwable $e): void;

    /**
     * @param mixed $request
     * @return array<string, mixed>
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    abstract protected function doRequest($request): array;

    /**
     * @param \Throwable $e
     * @throws AmadeusException
     */
    abstract protected function throwCacheError(\Throwable $e): void;

    /**
     * @param mixed $request
     * @param string $cacheKey
     * @param \DateInterval $dateInterval
     * @param CacheConfigInterface|null $cacheConfig
     * @return array|mixed
     * @throws AmadeusException
     */
    protected function getRawResponse(
        $request,
        string $cacheKey,
        \DateInterval $dateInterval,
        ?CacheConfigInterface $cacheConfig = null
    ) {
        if ($cacheConfig) {
            try {
                $rawResponse = $cacheConfig->getCache()->get(
                    \implode('_', [
                        $cacheKey,
                        $cacheConfig->getCacheKeyGenerator()->generate()
                    ]),
                    fn (CacheItemInterface $item): array => $this->cacheCallback(
                        $item,
                        $request,
                        $dateInterval
                    )
                );
            } catch (InvalidArgumentException $e) {
                $this->throwCacheError($e);
            }
        } else {
            $rawResponse = $this->request($request);
        }

        return $rawResponse;
    }

    /**
     * @param CacheItemInterface $item
     * @param FlightOffersSearchRequest $flightOffersSearchRequest
     * @param \DateInterval $dateInterval
     * @return array<string, mixed>
     * @throws AmadeusException
     */
    protected function cacheCallback(
        CacheItemInterface $item,
        FlightOffersSearchRequest $flightOffersSearchRequest,
        \DateInterval $dateInterval
    ): array {
        $token = $this->request($flightOffersSearchRequest);
        $item->expiresAfter($dateInterval);

        return $token;
    }

    /**
     * @param mixed $request
     * @return array<string, mixed>|mixed
     * @throws AmadeusException
     */
    protected function request($request): array
    {
        try {
            $response = $this->doRequest($request);
        } catch (ClientExceptionInterface |
            DecodingExceptionInterface |
            RedirectionExceptionInterface |
            ServerExceptionInterface |
            TransportExceptionInterface $e
        ) {
            $this->throwException($e);
        }

        return $response;
    }
}
