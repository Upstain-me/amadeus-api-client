<?php

namespace Upstain\AmadeusApiClient\Exception;

class ExceptionCode implements \Stringable
{
    public const AUTH = 100;
    public const FLIGHT_OFFERS_SEARCH = 200;
    public const FLIGHT_OFFERS_PRICING = 300;

    /**
     * @var int
     */
    private $sourceExceptionCode;

    /**
     * @var int
     */
    private int $ownExceptionCode;

    /**
     * @param int $ownExceptionCode
     * @param int $sourceExceptionCode
     */
    public function __construct(int $ownExceptionCode, $sourceExceptionCode)
    {
        $this->sourceExceptionCode = $sourceExceptionCode;
        $this->ownExceptionCode = $ownExceptionCode;
    }

    public function __toString(): string
    {
        return $this->sourceExceptionCode . $this->ownExceptionCode;
    }
}
