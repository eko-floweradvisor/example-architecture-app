<?php

use App\Models\Order;

use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

test('user can store order', function () {
    $response = postJson('order', [
        'customer_id' => 1,
        'total' => 100,
        'order_date' => '2022-01-01'
    ]);

    expect($response->status())->toEqual(200)
        ->and($response['customer_id'])->toBe(1);

});

test('user can get order', function () {
    $order = Order::factory()->create();

    // Should get the user from the user controller
    $response = getJson('order/' . $order->id);

    // Response should contain a user and be within the 200 range
    expect($response->status())->toEqual(200)
        ->and($response['id'])->toBe($order->id);
});
