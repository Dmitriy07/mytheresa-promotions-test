<?php

namespace App\Mytheresa\Infrastructure\Messaging;

use Symfony\Component\Messenger\MessageBusInterface;

class SimpleCommandBus implements CommandBus
{
    public function __construct(
        private readonly MessageBusInterface $messageBusCommand
    ){}
    public function dispatch(CommandMessage $command): void
    {
        $this->messageBusCommand->dispatch(message: $command);
    }
}