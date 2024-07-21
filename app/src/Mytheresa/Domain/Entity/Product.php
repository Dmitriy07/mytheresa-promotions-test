<?php

namespace App\Mytheresa\Domain\Entity;

use App\Mytheresa\Domain\ValueObject\Discount;
use App\Mytheresa\Domain\ValueObject\Price;

class Product
{
    private Price $price;

    public function __construct(
        private readonly string $sku,
        private readonly string $name,
        private readonly string $category,
        int                     $price
    )
    {
        $calculatedDiscount = (new Discount($category, $sku))->calculate();
        $this->price = new Price($price, $calculatedDiscount);
    }

    public function toArray(): array
    {
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'category' => $this->category,
            'price' => $this->price->toArray(),
        ];
    }
}