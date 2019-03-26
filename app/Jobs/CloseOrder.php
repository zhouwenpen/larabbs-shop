<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class CloseOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order, $delay)
    {
        $this->order = $order;
        $this->delay($delay);
        \Log::channel('single')->warning('开始延时 '.$delay);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->order->paid_at) {
            return;
        }
        \Log::channel('single')->warning($this->order);

        // 判断对应的订单是否已经被支付
        // 如果已经支付则不需要关闭订单，直接退出
        $log = new Log();
        \DB::transaction(function () use($log){
            $log::channel('single')->warning('事物中');
            $log::channel('single')->warning($this->order->items);
            //关闭订单
            $this->order->update(['closed' => true]);

            // 循环遍历订单中的商品 SKU，将订单中的数量加回到 SKU 的库存中去
            foreach ($this->order->items as $item) {
                $log::channel('single')->warning('订单回到库存');
                $item->productSku->addStock($item->amount);
            }
        });
        \Log::channel('single')->warning('结束');
    }
}
