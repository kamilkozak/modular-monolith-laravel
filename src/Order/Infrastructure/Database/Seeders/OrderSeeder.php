<?php

declare(strict_types=1);

namespace Module\Order\Infrastructure\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Module\Order\Domain\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();

        Order::factory(10)->for($user)->create();
    }
}
