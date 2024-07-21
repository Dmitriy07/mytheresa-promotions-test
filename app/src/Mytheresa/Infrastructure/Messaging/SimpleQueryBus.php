<?php

namespace App\Mytheresa\Infrastructure\Messaging;

use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class SimpleQueryBus implements QueryBus
{
    public function __construct(
        private readonly MessageBusInterface $messageBusQuery
    ){}

    public function handle(QueryMessage $query): mixed
    {
        $envelope = $this->messageBusQuery->dispatch($query);
        $stamp = $envelope->last(HandledStamp::class);

        return $stamp->getResult();
    }
}