<?php

namespace Upstain\AmadeusApiClient;

use Plumbok\Annotation\Getter;
use Plumbok\Annotation\Setter;
use Psr\Cache\CacheItemInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Upstain\AmadeusApiClient\Constants\CacheConstant;
use Upstain\AmadeusApiClient\Exception\AmadeusException;

/**
 * Class Client
 *
 * @method \Upstain\AmadeusApiClient\Configuration getConfiguration()
 * @method void setConfiguration(\Upstain\AmadeusApiClient\Configuration $configuration)
 */
class Client
{
    /**
     * @var Configuration
     * @Getter
     * @Setter
     */
    private Configuration $configuration;

    public function authenticate(?CacheInterface $cache = null): AuthenticatedClient
    {
        if (!$cache) {
            return $this->auth();
        }

        return $cache->get(
            CacheConstant::AUTH_CACHE,
            fn (CacheItemInterface $item): AuthenticatedClient => $this->cacheCallback($item)
        );
    }

    private function cacheCallback(CacheItemInterface $item): AuthenticatedClient
    {
        $token = $this->auth();
        $item->expiresAfter((int) $token->getExpiresIn());

        return $token;
    }

    /**
     * @return AuthenticatedClient
     * @throws AmadeusException
     */
    protected function auth(): AuthenticatedClient
    {
        try {
            $client = HttpClient::create([
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ]
            ]);

            $response = $client->request(
                'POST',
                $this->getConfiguration()->getBaseUrl() . '/v1/security/oauth2/token',
                [
                    'body' => [
                        'grant_type' => 'client_credentials',
                        'client_id' => $this->getConfiguration()->getClientId(),
                        'client_secret' => $this->getConfiguration()->getClientSecret(),
                    ],
                ],
            );
            $content = $response->toArray();

            $authClient = new AuthenticatedClient();
            $authClient->setExpiresIn($content['expires_in']);
            $authClient->setAccessToken($content['access_token']);
            $authClient->setTokenType($content['token_type']);
            return $authClient;
        } catch (ClientExceptionInterface |
            DecodingExceptionInterface |
            RedirectionExceptionInterface |
            ServerExceptionInterface |
            TransportExceptionInterface $e
        ) {
            throw AmadeusException::authError($e);
        }
    }
}
