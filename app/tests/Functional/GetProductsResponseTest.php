<?php

namespace App\Tests\Functional;

use App\Tests\Functional\Stub\ProductRepositoryImplementationStub;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetProductsResponseTest extends WebTestCase
{
    public function testSuccessfulResponseIfNotParametersSpecified(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/products');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertEquals('[]', $client->getResponse()->getContent());
    }

    public function testSuccessfulResponseIfBothParametersSpecified(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/products?category=' .
            ProductRepositoryImplementationStub::CATEGORY_TEST_VALUE .
            '&priceLessThan=' .
            ProductRepositoryImplementationStub::PRICE_LESS_THAN_TEST_VALUE);

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertEquals('[]', $client->getResponse()->getContent());
    }

    public function testSuccessfulResponseIfOnlyCategoryParameterSpecified(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/products?category=' .
            ProductRepositoryImplementationStub::CATEGORY_TEST_VALUE);

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertEquals('[]', $client->getResponse()->getContent());
    }

    public function testSuccessfulResponseIfOnlyPriceLessThanParameterSpecified(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/products?priceLessThan=' .
            ProductRepositoryImplementationStub::PRICE_LESS_THAN_TEST_VALUE);

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertEquals('[]', $client->getResponse()->getContent());
    }
}
