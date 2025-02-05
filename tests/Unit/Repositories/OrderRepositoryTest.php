<?php

use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->orderRepository = new OrderRepository();
});

test('it can create an order', function () {
    $order = $this->orderRepository->createOrder([
        'customer_id' => 1,
        'total' => 100,
        'order_date' => '2022-01-01'
    ]);

    expect($order)->toBeInstanceOf(Order::class)
        ->and($order->total)->toBe(100)
        ->and($order->order_date)->toBe('2022-01-01');
});

test('it can find an order by id', function () {
    $order = Order::factory()->create();

    $foundOrder = $this->orderRepository->findById($order->id);

    expect($foundOrder)->not->toBeNull()
        ->and($foundOrder->id)->toBe($order->id);
});
