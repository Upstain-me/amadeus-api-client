<?php

namespace Upstain\AmadeusApiClient;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Upstain\AmadeusApiClient\Exception\AmadeusException;

/**
 * @template RequestType
 */
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
     * @param \Throwable $originalException
     *
     * @return AmadeusException
     */
    abstract protected function throwException(\Throwable $originalException): AmadeusException;

    /**
     * @param RequestType $request
     *
     * @return array<string, mixed>
     *
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    abstract protected function doRequest($request): array;

    /**
     * @param RequestType $request
     *
     * @return array<string, mixed>
     *
     * @throws AmadeusException
     */
    protected function getRawResponse($request): ?array
    {
        $response = null;
        try {
            return $this->doRequest($request);
        } catch (ClientExceptionInterface |
            DecodingExceptionInterface |
            RedirectionExceptionInterface |
            ServerExceptionInterface |
            TransportExceptionInterface $e
        ) {
            throw $this->throwException($e);
        }
    }
}
