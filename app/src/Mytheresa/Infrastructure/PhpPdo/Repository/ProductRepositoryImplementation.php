<?php

namespace App\Mytheresa\Infrastructure\PhpPdo\Repository;

use App\Mytheresa\Domain\Entity\Product;
use App\Mytheresa\Domain\Repository\ProductRepository;
use App\Mytheresa\Infrastructure\DbConnection;
use PDO;

class ProductRepositoryImplementation implements ProductRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = DbConnection::getInstance();
    }

    public function getProducts(
        int $limit,
        ?string $category,
        ?int $priceLessThan,
    ): array
    {
        $productsFromDb = $this->getProductsFromDb($limit, $category, $priceLessThan);

        $products = [];
        foreach ($productsFromDb as $product) {
            $products[] = new Product(
                $product['sku'],
                $product['name'],
                $product['category'],
                $product['price']
            );
        }

        return $products;
    }

    /**
     * @param int $limit
     * @param string|null $category
     * @param int|null $priceLessThan
     * @return array
     */
    public function getProductsFromDb(int $limit, ?string $category, ?int $priceLessThan): array
    {
        $sql = 'SELECT sku, name, category, price FROM products';

        if (!empty($category) || !empty($priceLessThan)) {
            $sql .= ' WHERE ';
        }

        if (!empty($category)) {
            $sql .= 'category = :category';
        }

        if (!empty($category) && !empty($priceLessThan)) {
            $sql .= ' AND ';
        }

        if (!empty($priceLessThan)) {
            $sql .= 'price < :price';
        }

        $sql .= ' LIMIT :limit';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        if (!empty($category)) {
            $stmt->bindParam(':category', $category);
        }
        if (!empty($priceLessThan)) {
            $stmt->bindParam(':price', $priceLessThan);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}