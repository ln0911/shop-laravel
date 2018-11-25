<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Requests\Request;
use App\Models\Order;
use App\Models\UserAddress;
use App\Services\OrderService;

class OrdersController extends Controller
{

    /**
     * 订单列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){

         $orders = Order::query()->with(['items.product','items.productSku'])
                                 ->where('user_id',$request->user()->id)
                                 ->orderBy('created_at','desc')
                                 ->paginate();
         return view('orders.index',['orders'=>$orders]);
    }

    public function show(Order $order,Request $request)
    {
        $this->authorize('own',$order);

        return view('orders.show',['order'=>$order->load(['items.productSku','items.product'])]);
    }
    /**
     * 订单创建
     * @param OrderRequest $request
     * @return mixed
     */
    public function store(OrderRequest $request,OrderService $orderService)
    {
        $user    = $request->user();
        $address = UserAddress::find($request->input('address_id'));

        return $orderService->store($user,$address,$request->input('remark'),$request->input('items'));

    }
}