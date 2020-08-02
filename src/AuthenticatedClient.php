<?php

namespace Upstain\AmadeusApiClient;

use Plumbok\Annotation\Getter;
use Plumbok\Annotation\RequiredArgsConstructor;

/**
 * @RequiredArgsConstructor
 * @method void __construct(string $expiresIn, string $tokenType, string $accessToken)
 * @method string getExpiresIn()
 * @method string getTokenType()
 * @method string getAccessToken()
 */
class AuthenticatedClient
{
    /**
     * @var string
     * @Getter
     */
    private string $expiresIn;

    /**
     * @var string
     * @Getter
     */
    private string $tokenType;

    /**
     * @var string
     * @Getter
     */
    private string $accessToken;
}
