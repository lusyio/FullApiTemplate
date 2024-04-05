<?php 

namespace App\Helpers;

use App\Exceptions\ValidationResponseException;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Validator;

class Utils {
    static function convertErrorToProtocol(Validator $validator): void
    {
        $errors = $validator->errors();
        Log::error($errors);
        if ($errors->count() > 0) {
            $result = new ProtocolResp();
            foreach ($errors->keys() as $k) {
                $result->result = false;
                $result->msg = $errors->get($k)[0] ?? 'Unknown error';
                foreach ($errors->get($k) as $subError) {
                    $result->errors[] = new ProtocolError(['msg' => $subError, 'field' => $k]);
                }
            }
            throw new ValidationResponseException($result->msg, $result);
        }
    }
}