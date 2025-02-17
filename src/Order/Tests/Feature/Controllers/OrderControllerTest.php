<?php

use App\Models\User;
use Illuminate\Support\Facades\Event;
use Module\Inventory\Contracts\DataTransferObjects\ProductDto;
use Module\Inventory\Contracts\ProductService;
use Module\Order\Contracts\Events\OrderFulfilled;
use Module\Order\Domain\Models\Cart;
use Module\Order\Domain\Models\TaxRate;
use Module\Payment\Contracts\PaymentService;
use Laravel\Sanctum\Sanctum;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\mock;
use function Pest\Laravel\postJson;

uses(Tests\TestCase::class);

it('creates a new order', function () {
    Event::fake();

    TaxRate::factory()->create();
    $user = User::factory()->create();
    $cart = Cart::factory()->create([
        'user_id' => $user->id,
    ]);

    $products = collect([
        new ProductDto(1, 'Product 1', 100),
        new ProductDto(2, 'Product 2', 200),
    ]);

    $cart->cartItems()->createMany(
        $products->map(fn (ProductDto $product) => [
            'product_id' => $product->id,
            'quantity' => 1,
        ])
    );

    mock(ProductService::class, function ($mock) use ($products) {
        $products->each(function (ProductDto $product) use ($mock) {
            $mock->shouldReceive('decrementStock')
                ->with($product->id, 1)
                ->once();

            $mock->shouldReceive('getProductById')
                ->with($product->id)
                ->once()
                ->andReturn($product);
        });
    });

    mock(PaymentService::class)
        ->shouldReceive('charge')
        ->once();

    Sanctum::actingAs($user);

    $order = postJson('/order-module/orders', ['cart_id' => $cart->id])
        ->assertCreated()
        ->json('data');

    assertDatabaseHas('orders', [
        'id' => $order['id'],
    ]);
    assertDatabaseCount('order_lines', 2);
    Event::assertDispatched(OrderFulfilled::class, $order['id']);
});
