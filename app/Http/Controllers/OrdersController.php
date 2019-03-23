<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\ProductSku;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    public function store(OrderRequest $request)
    {
        $user = $request->user();

        $order = DB::transaction(function () use ($user, $request) {
            $address = UserAddress::find($request->input('address_id'));
            Log::channel('single')->info('闻朋1', [$address]);
            $address->update(['last_used_at' => Carbon::now()]);
            // 创建一个订单
            $order   = new Order([
                'address'      => [ // 将地址信息放入订单中
                    'address'       => $address->full_address,
                    'zip'           => $address->zip,
                    'contact_name'  => $address->contact_name,
                    'contact_phone' => $address->contact_phone,
                ],
                'remark'       => $request->input('remark'),
                'total_amount' => 0,
            ]);
            // 订单关联到当前用户
            $order->user()->associate($user);
            // 写入数据库
            Log::channel('single')->info('闻朋2', [$order]);
            $order->save();
//            Log::channel('single')->info('闻朋3', [$items]);

            $totalAmount = 0;
            $items = $request->input('items');
            foreach ($items as $data) {
                $sku = ProductSku::find($data['sku_id']);
                $item = $order->items()->make([
                    'amount' => $data['amount'],
                    'price' => $sku->price,
                ]);
                $item->product()->associate($sku->product_id);
                $item->productSku()->associate($sku);
                $totalAmount = $sku->price * $data['amount'];
                if ($sku->decreaseStock($data['amount']) <= 0) {
                    throw new InvalidRequestException('该商品库存不足');
                }
            }

            $order->update(['total_amount' => $totalAmount]);

            $skuIds = collect($items)->pluck('sku_id');
            $user->cartItems()->whereIn('product_sku_id', $skuIds)->delete();

            return $order;
        });

        return $order;
    }

}
