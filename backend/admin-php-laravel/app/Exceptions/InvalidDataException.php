<?php

namespace App\Exceptions;

use App\Helpers\ProtocolError;
use Exception;

class InvalidDataException extends Exception
{
    //

    public $errors = [];
    public $status = 200;
    public function __construct(string $message = "", $field = null, int $code = 200, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->status = $code;
        if (!empty($field))
            $this->errors[] = new ProtocolError(['msg' => $message, 'field' => $field]);
    }
}
