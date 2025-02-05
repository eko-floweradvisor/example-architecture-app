<?php

use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Services\OrderService;
use Mockery;

beforeEach(function () {
    $this->orderRepository = Mockery::mock(OrderRepository::class);
    $this->orderService = new OrderService($this->orderRepository);
});

test('it places an order successfully', function () {
    $orderData = ['customer_id' => 1, 'total' => 100, 'order_date' => '2025-01-01'];

    $this->orderRepository
        ->shouldReceive('createOrder')
        ->once()
        ->with($orderData)
        ->andReturn(new Order($orderData));

    $order = $this->orderService->placeOrder($orderData);

    expect($order)->toBeInstanceOf(Order::class)
        ->and($order->total)->toBe(100);
});

test('it gets an order by id', function () {
    $orderData = ['id' => 3, 'customer_id' => 3, 'total' => 100, 'order_date' => '2025-01-01'];

    $this->orderRepository
        ->shouldReceive('findById')
        ->once()
        ->with($orderData['id'])
        ->andReturn(new Order($orderData));

    $order = $this->orderService->getOrder($orderData['id']);

    expect($order)->not->toBeNull()
        ->and($order->customer_id)->toBe($orderData['customer_id']);
});
