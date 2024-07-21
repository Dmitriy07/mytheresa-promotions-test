<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Products extends AbstractMigration
{
    public function up(): void
    {
        $this->execute('
            CREATE TABLE IF NOT EXISTS `products` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `sku` varchar(10) NOT NULL,
                `name` varchar(255) NOT NULL,
                `category` varchar(255) NOT NULL,
                `price` int(11) NOT NULL,
                `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                INDEX `sku` (`sku`),
                INDEX `category` (`category`)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
        ');

        $this->execute('
            INSERT INTO `products` 
                (`sku`, `name`, `category`,`price`) 
            VALUES 
                ("000001", "BV Lean leather ankle boots", "boots", 89000),
                ("000002", "BV Lean leather ankle boots", "boots", 99000),
                ("000003", "Ashlington leather ankle boots", "boots", 71000),
                ("000004", "Naima embellished suede sandals", "sandals", 79500),
                ("000005", "Nathane leather sneakers", "sneakers", 59000)
        ');
    }
}
