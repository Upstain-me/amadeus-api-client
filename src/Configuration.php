<?php

namespace Upstain\AmadeusApiClient;

use Plumbok\Annotation\Getter;
use Plumbok\Annotation\Setter;
use Plumbok\Annotation\ToString;

/**
 * @ToString(property = "baseUrl")
 * @method string getBaseUrl()
 * @method void setBaseUrl(string $baseUrl)
 * @method string toString()
 * @method string getClientId()
 * @method void setClientId(string $clientId)
 * @method string getClientSecret()
 * @method void setClientSecret(string $clientSecret)
 */
class Configuration
{
    /**
     * @var string
     *
     * @Getter
     * @Setter
     */
    private string $baseUrl = 'https://test.api.amadeus.com';

    /**
     * @var string
     *
     * @Getter
     * @Setter
     */
    private string $clientId;

    /**
     * @var string
     *
     * @Getter
     * @Setter
     */
    private string $clientSecret;
}
