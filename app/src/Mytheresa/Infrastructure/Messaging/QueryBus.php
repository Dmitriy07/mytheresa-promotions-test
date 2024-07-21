<?php

namespace App\Mytheresa\Infrastructure\Messaging;

interface QueryBus
{
    public function handle(QueryMessage $query): mixed;
}