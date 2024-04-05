<?php

namespace App\Exceptions;

use Exception;

class ValidationResponseException extends Exception
{
    //

    public $response;
    public function __construct(string $message = "", $protocolResponse = null, int $code = 200, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->response = $protocolResponse;
    }
}
