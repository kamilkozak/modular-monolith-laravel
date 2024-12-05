<?php

namespace Module\Inventory\Contracts;

use Module\Inventory\Contracts\DataTransferObjects\ProductDto;

interface ProductService
{
    /**
     * Decrement product stock.
     *
     * @param  int  $productId
     * @param  int  $quantity
     * @return void
     *
     * @throws \Module\Inventory\Contracts\Exceptions\ProductNotFoundException
     * @throws \Module\Inventory\Contracts\Exceptions\OutOfStockException
     * @throws \Module\Inventory\Contracts\Exceptions\InactiveProductException
     */
    public function decrementStock(int $productId, int $quantity): void;

    /**
     * Get product by product id.
     *
     * @param  int  $id
     * @return \Module\Inventory\Contracts\DataTransferObjects\ProductDto
     *
     * @throws \Module\Inventory\Contracts\Exceptions\ProductNotFoundException
     */
    public function getProductById(int $productId): ProductDto;
}
