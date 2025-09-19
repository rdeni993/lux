<?php

namespace Rdeni\Lux\Services;

use Rdeni\Lux\Contracts\Crud\CrudInterface;
use Rdeni\Lux\Exceptions\ClassNotFoundException;
use Rdeni\Lux\Exceptions\CrudNotImplementedException;

class ResolveCrudClassService
{
    /**
     * @param string
     *
     * @return CrudInterface
     *
     * @throws ClassNotFoundException
     * @throws CrudNotImplementedException
     * @throws ModelNotFoundException
     */
    public function __invoke(string $crudClassInterface, int $crudModelId = 0) : CrudInterface
    {
        if(! class_exists($crudClassInterface)) {
            throw new ClassNotFoundException($crudClassInterface);
        }

        $crudInterface = app($crudClassInterface);

        if(! $crudInterface instanceof CrudInterface) {
            throw new CrudNotImplementedException($crudClassInterface);
        }

        return ($crudModelId) ?
            $crudInterface::findOrFail($crudModelId) :
            $crudInterface;
    }
}