<?php

namespace App\Mytheresa\Application\Query;

use App\Mytheresa\Domain\UseCase\GetProducts as GetProductsUseCase;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class GetProductsMessageHandler
{
    public function __construct(
        private readonly GetProductsUseCase $productRepositoryUseCase
    ) {}

    public function __invoke(GetProductsMessage $getProductsMessage): array
    {
        return $this->productRepositoryUseCase->execute(
            $getProductsMessage->getLimit(),
            $getProductsMessage->getCategory(),
            $getProductsMessage->getPriceLessThan(),
        );
    }
}