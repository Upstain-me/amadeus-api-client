<?php

namespace Upstain\AmadeusApiClient;

use Plumbok\Annotation\Getter;
use Plumbok\Annotation\Setter;
use Upstain\AmadeusApiClient\Shopping\Shopping;

/**
 * @method string getExpiresIn()
 * @method void setExpiresIn(string $expiresIn)
 * @method string getTokenType()
 * @method void setTokenType(string $tokenType)
 * @method string getAccessToken()
 * @method void setAccessToken(string $accessToken)
 */
class AuthenticatedClient extends Client
{
    /**
     * @var string
     * @Getter
     * @Setter
     */
    private string $expiresIn;

    /**
     * @var string
     * @Getter
     * @Setter
     */
    private string $tokenType;

    /**
     * @var string
     * @Getter
     * @Setter
     */
    private string $accessToken;

    public function shopping(): Shopping
    {
        return new Shopping($this);
    }
}
