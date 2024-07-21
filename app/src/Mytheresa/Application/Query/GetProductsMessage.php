<?php

namespace App\Mytheresa\Application\Query;

use App\Mytheresa\Infrastructure\Messaging\QueryMessage;

class GetProductsMessage implements QueryMessage
{
    public function __construct(
        private readonly int $limit,
        private readonly ?string $category = null,
        private readonly ?int $priceLessThan = null
    ) {}

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getPriceLessThan(): ?int
    {
        return $this->priceLessThan;
    }
}