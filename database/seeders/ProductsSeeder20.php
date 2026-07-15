<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder20 extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'iPhone 15', 'sku' => 'IP15-001', 'description' => 'Apple iPhone 15 128GB', 'price' => 799.99, 'stock' => 50, 'is_active' => true, 'is_featured' => true],
            ['name' => 'Samsung Galaxy S24', 'sku' => 'SGS24-002', 'description' => 'Samsung Galaxy S24 Ultra', 'price' => 899.99, 'stock' => 35, 'is_active' => true, 'is_featured' => true],
            ['name' => 'MacBook Pro 14', 'sku' => 'MBP14-003', 'description' => 'Apple MacBook Pro 14 inch M3', 'price' => 1999.99, 'stock' => 20, 'is_active' => true, 'is_featured' => true],
            ['name' => 'iPad Air', 'sku' => 'IPA-004', 'description' => 'Apple iPad Air M2', 'price' => 599.99, 'stock' => 45, 'is_active' => true, 'is_featured' => false],
            ['name' => 'AirPods Pro', 'sku' => 'APP-005', 'description' => 'Apple AirPods Pro 2nd Gen', 'price' => 249.99, 'stock' => 100, 'is_active' => true, 'is_featured' => false],
            ['name' => 'Dell XPS 15', 'sku' => 'DXPS-006', 'description' => 'Dell XPS 15 Intel i7', 'price' => 1299.99, 'stock' => 15, 'is_active' => true, 'is_featured' => false],
            ['name' => 'Sony WH-1000XM5', 'sku' => 'SWH-007', 'description' => 'Sony Wireless Headphones', 'price' => 349.99, 'stock' => 60, 'is_active' => true, 'is_featured' => true],
            ['name' => 'Nintendo Switch', 'sku' => 'NSW-008', 'description' => 'Nintendo Switch OLED', 'price' => 349.99, 'stock' => 40, 'is_active' => true, 'is_featured' => false],
            ['name' => 'LG OLED TV 55', 'sku' => 'LGTV-009', 'description' => 'LG OLED C3 55 inch TV', 'price' => 1499.99, 'stock' => 10, 'is_active' => true, 'is_featured' => true],
            ['name' => 'Canon EOS R6', 'sku' => 'CER6-010', 'description' => 'Canon EOS R6 Mark II Camera', 'price' => 2499.99, 'stock' => 8, 'is_active' => true, 'is_featured' => false],
            ['name' => 'Kindle Paperwhite', 'sku' => 'KPW-011', 'description' => 'Amazon Kindle Paperwhite 11th Gen', 'price' => 139.99, 'stock' => 80, 'is_active' => true, 'is_featured' => false],
            ['name' => 'JBL Flip 6', 'sku' => 'JBL6-012', 'description' => 'JBL Flip 6 Bluetooth Speaker', 'price' => 129.99, 'stock' => 70, 'is_active' => true, 'is_featured' => false],
            ['name' => 'GoPro Hero 12', 'sku' => 'GPH12-013', 'description' => 'GoPro Hero 12 Black', 'price' => 399.99, 'stock' => 25, 'is_active' => true, 'is_featured' => true],
            ['name' => 'Logitech MX Master 3S', 'sku' => 'LMXM-014', 'description' => 'Logitech MX Master 3S Mouse', 'price' => 99.99, 'stock' => 90, 'is_active' => true, 'is_featured' => false],
            ['name' => 'Apple Watch Series 9', 'sku' => 'AWS9-015', 'description' => 'Apple Watch Series 9 45mm', 'price' => 429.99, 'stock' => 55, 'is_active' => true, 'is_featured' => true],
            ['name' => 'Samsung 990 Pro SSD', 'sku' => 'S990-016', 'description' => 'Samsung 990 Pro 2TB NVMe SSD', 'price' => 179.99, 'stock' => 120, 'is_active' => true, 'is_featured' => false],
            ['name' => 'ASUS ROG Strix G16', 'sku' => 'AROG-017', 'description' => 'ASUS ROG Strix G16 Gaming Laptop', 'price' => 1599.99, 'stock' => 12, 'is_active' => true, 'is_featured' => true],
            ['name' => 'Bose QuietComfort Ultra', 'sku' => 'BQC-018', 'description' => 'Bose QC Ultra Headphones', 'price' => 429.99, 'stock' => 30, 'is_active' => true, 'is_featured' => false],
            ['name' => 'Razer BlackWidow V4', 'sku' => 'RBW-019', 'description' => 'Razer BlackWidow V4 Mechanical Keyboard', 'price' => 199.99, 'stock' => 45, 'is_active' => true, 'is_featured' => false],
            ['name' => 'DJI Mini 4 Pro', 'sku' => 'DJIM4-020', 'description' => 'DJI Mini 4 Pro Drone', 'price' => 759.99, 'stock' => 18, 'is_active' => true, 'is_featured' => true],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
