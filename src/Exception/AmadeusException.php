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
}
