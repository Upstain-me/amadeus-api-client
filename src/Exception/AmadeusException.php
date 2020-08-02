<?php

namespace Upstain\AmadeusApiClient\Exception;

use Plumbok\Annotation\Getter;
use Throwable;

/**
 * Class AmadeusException
 *
 * @method int getErrorCode()
 */
class AmadeusException extends \Exception
{
    /**
     * @var int
     * @Getter
     */
    private int $errorCode;

    public function __construct(
        $errorCode,
        $message = "",
        $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->errorCode = $errorCode;
    }

    public static function authError(\Throwable $e): AmadeusException
    {
        $message = 'Amadeus Auth error: ' . $e->getMessage();
        return new static(ExceptionCode::AUTH, $message, $e->getCode(), $e);
    }

    public static function authCacheError(\Throwable $e): AmadeusException
    {
        $message = 'Amadeus Auth cache error: ' . $e->getMessage();

        return new static($message, $e->getCode());
    }

    public static function jsonError(\Throwable $e): AmadeusException
    {
        return new static($e->getMessage(), $e->getCode());
    }
}
