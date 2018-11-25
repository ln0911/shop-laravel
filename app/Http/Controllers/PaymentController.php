<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\OrderPaid;

class PaymentController extends Controller
{
    /**
     * 支付宝支付
     * @param Order $order
     * @param Request $request
     * @return mixed
     * @throws InvalidRequestException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function payByAlipay(Order $order,Request $request)
    {
        $this->authorize('own',$order);

        if($order->closed || $order->paid_at){
            throw new InvalidRequestException('订单状态不正确');
        }

        return app('alipay')->web([
            'out_trade_no'    =>  $order->no,
            'total_amount'    =>  $order->total_amount,
            'subject'         =>  '支付laravelshop的订单:'.$order->no,
        ]);
    }

    //前端回调
    public function alipayReturn()
    {
        $data = app('alipay')->verify();
        dd($data);
    }

    /**
     * 支付宝回调
     * @return string
     */
    public function alipayNotify()
    {
        $data = app('alipay')->verify();

        if(!in_array($data->trade_status,['TRADE_SUCCESS','TRADE_FINISHED']))
        {
            return app('alipay')->success();
        }

        $order = Order::where('no',$data->out_trade_no)->first();

        if(!$order){
            return 'fail';
        }

        if($order->paid_at){
            return app('alipay')->success();
        }

        $order->update([
            'paid_at'  => Carbon::now(),
            'payment_method' =>'alipay',
            'payment_no'     => $data->trade_no
        ]);

        $this->afterPaid($order);

        return app('alipay')->success();
    }


    protected function afterPaid(Order $order)
    {
        event(new OrderPaid($order));
    }


}
