<?php

namespace Upstain\AmadeusApiClient\Model;

use Plumbok\Annotation\Getter;
use Plumbok\Annotation\Setter;
use Upstain\AmadeusApiClient\Model\FlightOffers\Dictionaries;

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

    /**
     * @var Dictionaries
     */
    protected Dictionaries $dictionaries;

    /**
     * @return ResponseBase
     */
    public function transformRawResponse(): ResponseBase
    {
        if (isset($this->rawResponse['dictionaries'])) {
            $this->dictionaries = new Dictionaries($this->rawResponse['dictionaries']);
        }

        return $this;
    }

    /**
     * @return Dictionaries
     */
    public function getDictionaries(): Dictionaries
    {
        return $this->dictionaries;
    }
}
