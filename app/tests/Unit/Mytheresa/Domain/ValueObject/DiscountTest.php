<?php

namespace App\Tests\Unit\Mytheresa\Domain\ValueObject;

use App\Mytheresa\Domain\ValueObject\Discount;
use PHPUnit\Framework\TestCase;

class DiscountTest extends TestCase
{
    public function testCalculateReturns30ForBootsCategory()
    {
        $discount = new Discount('boots', 'any-sku');
        $this->assertEquals(30, $discount->calculate());
    }

    public function testCalculateReturns15ForSpecificSku()
    {
        $discount = new Discount('any-category', '000003');
        $this->assertEquals(15, $discount->calculate());
    }

    public function testCalculateReturns30ForBootsCategoryAnd000003Sku()
    {
        $discount = new Discount('boots', '000003');
        $this->assertEquals(30, $discount->calculate());
    }

    public function testCalculateReturnsNullForOtherCategoriesAndSkus()
    {
        $discount1 = new Discount('shoes', 'any-sku');
        $discount2 = new Discount('any-category', '000001');

        $this->assertNull($discount1->calculate());
        $this->assertNull($discount2->calculate());
    }
}
