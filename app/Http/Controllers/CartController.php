<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Models\CartItem;
use App\Models\ProductSku;
use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * 购物车列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $cartItems = $request->user()->cartItems()->with('productSku.product')->get();
        return view('cart.index',['cartItems'=>$cartItems]);
    }
    /**
     * add cart
     * @param AddCartRequest $request
     * @return array
     */
    public function add(AddCartRequest $request)
    {
        $user    = $request->user();
        $skuId   = $request->input('sku_id');
        $amount  = $request->input('amount');

        if($cart = $user->cartItems()->where('product_sku_id',$skuId)->first()){
            $cart->update(['amount'=>$cart->amount + $amount]);
        }else{

            $cart  = new CartItem(['amount'=>$amount]);
            $cart->user()->associate($user);
            $cart->productSku()->associate($skuId);
            $cart->save();
        }
        return [];
    }

    /**
     * 移除
     * @param ProductSku $sku
     * @param Request $request
     * @return array
     */
    public function remove(ProductSku $sku , Request $request)
    {
        $request->user()->cartItems()->where('product_sku_id',$sku->id)->delete();
        return [];
    }
}
