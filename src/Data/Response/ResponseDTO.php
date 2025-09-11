<?php

namespace Rdeni\Lux\Data\Response;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Spatie\LaravelData\Data;

class ResponseDTO extends Data
{
    /**
     * @var bool
     */
    public bool $success = false;

    /**
     * @var Model
     */
    public ?Model $data = null;

    /**
     * @param bool
     * @param Model
     */
    public function __construct(bool $success = false, ?Model $data = null)
    {
        // Success is required for our response
        $this->success = $success;

        // Data is optional
        if(isset($data)) {
            $this->data = $data;
        }
    }

    /**
     * @return bool
     */
    public function getSuccessStatus() : bool
    {
        return $this->success;
    }

    /**
     * @return Model
     */
    public function getData() : Model
    {
        if(empty($this->data)) {
            throw new InvalidArgumentException(
                "ResponseDTO expected a valid Eloquent model in 'data', but none was provided. Ensure that the response includes a model instance before calling getData()."
            );
        }

        return $this->data;
    }
}