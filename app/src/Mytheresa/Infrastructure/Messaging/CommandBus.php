<?php

namespace App\Mytheresa\Infrastructure\Messaging;

interface CommandBus
{
    public function dispatch(CommandMessage $command): void;
}