<?php

namespace App\Http\Controllers;

use App\Events\OrderReviewed;
use App\Exceptions\InvalidRequestException;
use App\Http\Requests\ApplyRefundRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\Request;
use App\Http\Requests\SendReviewRequest;
use App\Models\Order;
use App\Models\UserAddress;
use App\Services\OrderService;
use Carbon\Carbon;

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

    /**
     * 订单详情页
     * @param Order $order
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
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

    /**
     * 确认收货
     * @param Order $order
     * @param Request $request
     * @return Order
     * @throws InvalidRequestException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function received(Order $order , Request $request)
    {
        $this->authorize('own',$order);

        if($order->ship_status !== Order::SHIP_STATUS_DELIVERED){
            throw new InvalidRequestException('订单发货状态不对');
        }

        $order->update(['ship_status'=>Order::SHIP_STATUS_RECEIVED]);

        return $order;
    }


    /**
     * 订单评价
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws InvalidRequestException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function review(Order $order)
    {
        $this->authorize('own',$order);

        if(!$order->paid_at){
            throw new InvalidRequestException('订单未支付，不可评价');
        }

        return view('orders.review',['order'=>$order->load(['items.product','items.productSku'])]);
    }

    /**
     * 提交订单评价
     * @param Order $order
     * @param SendReviewRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws InvalidRequestException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function sendReview(Order $order,SendReviewRequest $request)
    {
        $this->authorize('own',$order);
        if(!$order->paid_at){
            throw new InvalidRequestException('订单未支付，不可评价');
        }

        if($order->reviewed){
            throw new InvalidRequestException('订单已评价，不可重复提交');
        }

        $reviews = $request->input('reviews');

        // 开启事务
        \DB::transaction(function () use ($reviews, $order) {
            // 遍历用户提交的数据
            foreach ($reviews as $review) {
                $orderItem = $order->items()->find($review['id']);
                // 保存评分和评价
                $orderItem->update([
                    'rating'      => $review['rating'],
                    'review'      => $review['review'],
                    'reviewed_at' => Carbon::now(),
                ]);
            }
            // 将订单标记为已评价
            $order->update(['reviewed' => true]);

            event(new OrderReviewed($order));
        });
        return redirect()->back();
    }


    /**
     * 申请退款
     * @param Order $order
     * @param ApplyRefundRequest $request
     * @return Order
     * @throws InvalidRequestException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function applyRefund(Order $order, ApplyRefundRequest $request)
    {
        $this->authorize('own',$order);

        if(!$order->paid_at){
            throw new InvalidRequestException('订单未付款，不可退款');
        }
        if($order->refund_status !== Order::REFUND_STATUS_PENDING){
            throw new InvalidRequestException('该订单已经申请过退款，请勿重复申请');
        }

        $extra = $order->extra ?: [];
        $extra['refund_reason'] = $request->input('reason');

        $order->update([
            'refund_status' => Order::REFUND_STATUS_APPLIED,
            'extra'         => $extra
        ]);

        return $order;
    }
}
