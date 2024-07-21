<?php

namespace App\Tests\Functional\Stub;

use App\Mytheresa\Domain\Repository\ProductRepository;
use http\Exception\BadQueryStringException;

class ProductRepositoryImplementationStub implements ProductRepository
{
    const CATEGORY_TEST_VALUE = 'boot-test';
    const PRICE_LESS_THAN_TEST_VALUE = 1;
    public function getProducts(
        int $limit,
        ?string $category,
        ?int $priceLessThan,
    ): array
    {

        if ($category === self::CATEGORY_TEST_VALUE && $priceLessThan === null) {
            return [];
        }

        if ($priceLessThan === self::PRICE_LESS_THAN_TEST_VALUE && $category === null) {
            return [];
        }

        if ($priceLessThan === self::PRICE_LESS_THAN_TEST_VALUE && $category === self::CATEGORY_TEST_VALUE) {
            return [];
        }
        if ($priceLessThan === null && $category === null) {
            return [];
        }

        throw new BadQueryStringException('Parameter is not valid');
    }
}