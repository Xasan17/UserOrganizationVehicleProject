<?php

namespace App\Exceptions;
use Exception;
class EnsureTokenException extends Exception {
    /**
     * @var
     */
    protected $customMessage;

    public function __construct($message = 'Forbidden!', $code = 403)
    {
        parent::__construct($message, $code);
//            , $previous);
//        $this->customMessage = $customMessage;
    }

//    public function getCustomMessage()
//    {
//        return $this->customMessage;
//    }
//public function register():void
//{$this->reportable(function (EnsureTokenException $e){
//
//})->stop();
//
//}

}




