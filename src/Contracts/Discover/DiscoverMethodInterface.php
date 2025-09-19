<?php

namespace Rdeni\Lux\Contracts\Discover;

use Rdeni\Lux\Contracts\Crud\CrudInterface;

interface DiscoverMethodInterface
{
    /**
     * @param CrudInterface
     *
     * @return object
     */
    public function discover(CrudInterface $crudInstance) : object;
}