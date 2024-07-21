<?php

namespace App\Mytheresa\Domain\UseCase;

use App\Mytheresa\Domain\Repository\ProductRepository;

class GetProducts
{
    public readonly ?string $category;

    public function __construct(
        private readonly ProductRepository $productRepository,
    ) {}
    public function execute(
        int $limit,
        ?string $category,
        ?int $priceLessThan,
    ): array
    {
        return $this->productRepository->getProducts($limit, $category, $priceLessThan);
    }
}