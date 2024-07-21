<?php

namespace App\Mytheresa\Domain\ValueObject;

class Discount
{
    private string $category;
    private string $sku;

    public function __construct(string $category, string $sku)
    {
        $this->category = $category;
        $this->sku = $sku;
    }

    public function calculate(): ?int
    {
        if ($this->category == 'boots') {
            return 30;
        }

        if ($this->sku == '000003') {
            return 15;
        }

        return null;
    }
}