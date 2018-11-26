<?php

use Faker\Generator as Faker;

use App\Models\User;
use App\Models\Order;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    //随机取一个用户及地址
    $user = User::query()->inRandomOrder()->first();
    $address = $user->addresses()->inRandomOrder()->first();

    // 10%概率标记订单为退款
    $refund = random_int(0,10) < 1;
    //随机生成发货状态
    $ship = $faker->randomElement(array_keys(\App\Models\Order::$shipStatusMap));
    //优惠券
    $coupon = null;

    // 30%概率该订单使用优惠券
    if( random_int(0,10) < 3){
        $coupon = \App\Models\CouponCode::query()->where('min_amount',0)->inRandomOrder()->first();
        //增加优惠券使用量
        $coupon->changeUsed();
    }

    return [
        'address'        => [
            'address'       => $address->full_address,
            'zip'           => $address->zip,
            'contact_name'  => $address->contact_name,
            'contact_phone' => $address->contact_phone,
        ],
        'total_amount'   => 0,
        'remark'         => $faker->sentence,
        'paid_at'        => $faker->dateTimeBetween('-30 days'), // 30天前到现在任意时间点
        'payment_method' => $faker->randomElement(['wechat', 'alipay']),
        'payment_no'     => $faker->uuid,
        'refund_status'  => $refund ? Order::REFUND_STATUS_SUCCESS : Order::REFUND_STATUS_PENDING,
        'refund_no'      => $refund ? Order::getAvailableRefundNo() : null,
        'closed'         => false,
        'reviewed'       => random_int(0, 10) > 2,
        'ship_status'    => $ship,
        'ship_data'      => $ship === Order::SHIP_STATUS_PENDING ? null : [
            'express_company' => $faker->company,
            'express_no'      => $faker->uuid,
        ],
        'extra'          => $refund ? ['refund_reason' => $faker->sentence] : [],
        'user_id'        => $user->id,
        'coupon_code_id' => $coupon ? $coupon->id : null,
    ];


});
