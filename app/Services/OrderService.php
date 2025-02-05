<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Exception;

class OrderService
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function placeOrder(array $data): Order
    {
        return $this->orderRepository->createOrder($data);
    }

    public function getOrder(int $id): Order
    {
        return $this->orderRepository->findById($id);
    }
}