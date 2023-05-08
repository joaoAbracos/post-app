<?php

namespace App\Exceptions;

use Exception;

class GeneralJsonException extends Exception
{
    protected $code = 422;


    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function render($request)
    {
        return $this->getMessage();
        
    }
}