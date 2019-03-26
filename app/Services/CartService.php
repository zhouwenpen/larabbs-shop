<?php

namespace App\Services;

use App\Http\Requests\Request;
use Auth;
use App\Models\CartItem;

class CartService
{
    public function get()
    {
        $request = new Request();
        \Log::channel('single')->alert($request->user());
        \Log::channel('single')->alert(Auth::user());
        return Auth::user()->cartItems()->with(['productSku.product'])->get();
    }

    public function add($skuId, $amount)
    {
        $user = Auth::user();

        if ($item = $user->cartItems()->where('product_sku_id', $skuId)->first()) {
            //存在则叠加数量
            $item->update([
                'amount' => $item->amount + $amount,
            ]);
        } else {
            //否则创建新纪录
            $item = new CartItem(['amount' => $amount]);
            $item->user()->associate($user);
            $item->productSku()->associate($skuId);
            $item->save();
        }

        return $item;
    }

    public function remove($skuIds)
    {
        //可以创单个ID，也可以传ID数组
        if (!is_array($skuIds)) {
            $skuIds = [$skuIds];
        }

        return Auth::user()->cartItems()->whereIn('product_sku_id', $skuIds)->delete();
    }
}