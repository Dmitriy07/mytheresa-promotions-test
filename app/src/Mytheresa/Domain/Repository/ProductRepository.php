<?php

namespace App\Mytheresa\Domain\Repository;

interface ProductRepository
{
    /**
     * @return array [?Product]
     */
    public function getProducts(
        int $limit,
        ?string $category,
        ?int $priceLessThan,
    ): array;
}