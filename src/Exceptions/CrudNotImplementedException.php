<?php

namespace Rdeni\Lux\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class CrudNotImplementedException extends Exception
{

    /**
     * @param string
     */
    public function __construct(
        protected string $className
    )
    {
        parent::__construct();
    }

    /**
     * @return void
     */
    public function report() : void
    {
        Log::error("{$this->className} not implemented CRUD method!", [
            'error' => self::class,
            'message' => $this->getMessage()
        ]);
    }

    /**
     * @return void
     */
    public function render() : void
    {
        abort(405);
    }
}