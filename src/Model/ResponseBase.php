<?php

namespace Upstain\AmadeusApiClient\Model;

use Plumbok\Annotation\Getter;
use Plumbok\Annotation\Setter;

/**
 * Class ResponseBase
 *
 * @method array|null getRawResponse()
 * @method void setRawResponse(array|null $rawResponse)
 */
abstract class ResponseBase
{
    /**
     * @var array<mixed>|null
     * @Getter
     * @Setter
     */
    protected ?array $rawResponse;
}
