<?php

use function Pest\Laravel\postJson;

test('it can validate required parameters', function () {
    $response = postJson('order', []);

    $response->assertJsonValidationErrors([
        'customer_id' => __('validation.required', ['attribute' => 'customer id']),
        'total' => __('validation.required', ['attribute' => 'total']),
        'order_date' => __('validation.required', ['attribute' => 'order date']),
    ]);
});

test('it can validate integer parameters', function () {
    $response = postJson('order', [
        'customer_id' => 'some string',
        'total' => 'some string',
    ]);

    $response->assertJsonValidationErrors([
        'customer_id' => __('validation.integer', ['attribute' => 'customer id']),
        'total' => __('validation.integer', ['attribute' => 'total']),
    ]);
});

test('it can validate date parameters', function () {
    $response = postJson('order', [
        'order_date' => 'some string',
    ]);

    $response->assertJsonValidationErrors([
        'order_date' => __('validation.date', ['attribute' => 'order date']),
    ]);
});
