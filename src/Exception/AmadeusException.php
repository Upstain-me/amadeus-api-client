<?php

namespace Upstain\AmadeusApiClient\Exception;

use Plumbok\Annotation\Getter;
use Throwable;

/**
 * Class AmadeusException
 *
 * @method int getErrorCode()
 */
final class AmadeusException extends \Exception
{
    /**
     * @var int
     * @Getter
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

    public static function authError(\Throwable $e): AmadeusException
    {
        $message = 'Amadeus Auth error: ' . $e->getMessage();
        return new AmadeusException(ExceptionCode::AUTH, $message, $e->getCode(), $e);
    }

    public static function authCacheError(\Throwable $e): AmadeusException
    {
        $message = 'Amadeus Auth cache error: ' . $e->getMessage();

        return new AmadeusException(ExceptionCode::AUTH, $message, $e->getCode());
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

    public static function flightOffersSearchCacheError(\Throwable $e): AmadeusException
    {
        $message = 'Flight Offers Search cache error: ' . $e->getMessage();

        return new AmadeusException(ExceptionCode::FLIGHT_OFFERS_SEARCH, $message, $e->getCode());
    }

    public static function flightOffersPricingError(\Throwable $e): AmadeusException
    {
        $message = 'Flight Offers Pricing error: ' . $e->getMessage();
        return new AmadeusException(ExceptionCode::FLIGHT_OFFERS_PRICING, $message, $e->getCode(), $e);
    }

    public static function flightOffersPricingCacheError(\Throwable $e): AmadeusException
    {
        $message = 'Flight Offers Pricing cache error: ' . $e->getMessage();

        return new AmadeusException(ExceptionCode::FLIGHT_OFFERS_PRICING, $message, $e->getCode());
    }
}
