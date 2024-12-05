<?php

declare(strict_types=1);

namespace Module\Inventory\Infrastructure\Services;

use Module\Inventory\Contracts\DataTransferObjects\ProductDto;
use Module\Inventory\Contracts\Exceptions\InactiveProductException;
use Module\Inventory\Contracts\Exceptions\OutOfStockException;
use Module\Inventory\Contracts\Exceptions\ProductNotFoundException;
use Module\Inventory\Contracts\ProductService as ProductServiceContract;
use Module\Inventory\Domain\Models\Product;

class ProductService implements ProductServiceContract
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
    public function decrementStock(int $productId, int $quantity): void
    {
        $product = Product::find($productId);

        if (! $product) {
            throw new ProductNotFoundException($productId);
        }

        if ($product->stock < $quantity) {
            throw new OutOfStockException($productId);
        }

        if (! $product->is_active) {
            throw new InactiveProductException($productId);
        }

        $product->decrement('stock', $quantity);
    }

    /**
     * Get product by product id.
     *
     * @param  int  $id
     * @return \Module\Inventory\Contracts\DataTransferObjects\ProductDto
     *
     * @throws \Module\Inventory\Contracts\Exceptions\ProductNotFoundException
     */
    public function getProductById(int $productId): ProductDto
    {
        $product = Product::find($productId);

        if (! $product) {
            throw new ProductNotFoundException($productId);
        }

        return new ProductDto(
            $product->id,
            $product->name,
            $product->price,
        );
    }
}
