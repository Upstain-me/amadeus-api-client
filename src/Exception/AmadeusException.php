<?php

namespace Upstain\AmadeusApiClient\Exception;

use Throwable;

final class AmadeusException extends \Exception
{
    /**
     * @var int
     */
    private int $errorCode;

    /**
     * @param int $errorCode
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        int $errorCode,
        string $message = "",
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->errorCode = $errorCode;
    }

    /**
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    public static function authError(\Throwable $e): AmadeusException
    {
        $message = 'Amadeus Auth error: ' . $e->getMessage();
        return new AmadeusException(ExceptionCode::AUTH, $message, $e->getCode(), $e);
    }

    public static function jsonError(\Throwable $e): AmadeusException
    {
        return new AmadeusException(ExceptionCode::AUTH, $e->getMessage(), $e->getCode());
    }

    public static function flightOffersSearchError(\Throwable $e): AmadeusException
    {
        $message = 'Flight Offers Search error: ' . $e->getMessage();
        return new AmadeusException(ExceptionCode::FLIGHT_OFFERS_SEARCH, $message, $e->getCode(), $e);
    }

    public static function flightOffersPricingError(\Throwable $e): AmadeusException
    {
        $message = 'Flight Offers Pricing error: ' . $e->getMessage();
        return new AmadeusException(ExceptionCode::FLIGHT_OFFERS_PRICING, $message, $e->getCode(), $e);
    }
}
