<?php

namespace Upstain\AmadeusApiClient\Model;

use Upstain\AmadeusApiClient\Model\FlightOffers\Dictionaries;

abstract class ResponseBase
{
    /**
     * @var array<string, mixed>
     */
    protected array $rawResponse;

    /**
     * @var Dictionaries|null
     */
    protected ?Dictionaries $dictionaries = null;

    /**
     * @param array<string, mixed> $rawResponse
     */
    public function __construct(array $rawResponse)
    {
        $this->rawResponse = $rawResponse;
    }

    /**
     * @param array<string, mixed> $rawResponse
     */
    protected function transformDictionaries(array $rawResponse): void
    {
        if (isset($rawResponse['dictionaries'])) {
            $this->dictionaries = new Dictionaries($rawResponse['dictionaries']);
        }
    }

    /**
     * @return array
     */
    public function getRawResponse(): array
    {
        return $this->rawResponse;
    }

    /**
     * @return Dictionaries|null
     */
    public function getDictionaries(): ?Dictionaries
    {
        return $this->dictionaries;
    }
}
