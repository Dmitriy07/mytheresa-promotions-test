<?php

namespace App\Mytheresa\Domain\ValueObject;

class Price
{
    private int $final;

    private string $currency = 'EUR';

    public function __construct(
        private readonly int  $original,
        private readonly ?int $discountPercentage,
    )
    {
        $this->final = $this->calculateFinalPrice();
    }

    private function calculateFinalPrice(): int
    {
        if ($this->discountPercentage === null) {
            return $this->original;
        }

        return $this->original - ($this->original * $this->discountPercentage / 100);
    }

    public function toArray(): array
    {
        return [
            'original' => $this->original,
            'final' => $this->final,
            'discount_percentage' => $this->discountPercentage,
            'currency' => $this->currency,
        ];
    }
}