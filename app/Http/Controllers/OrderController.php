<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\OrderService;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderRequest $request)
    {
        $request->validated();
        $order = $this->orderService->placeOrder($request->all());
        return response()->json($order);
    }

    public function show($id)
    {
        $order = $this->orderService->getOrder($id);
        return response()->json($order);
    }
}
