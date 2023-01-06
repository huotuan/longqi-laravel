<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class AttributeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attribute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->appends();

        return Command::SUCCESS;
    }

    public function appends()
    {
        $order = Order::query()->where('total', '>', 0)->paginate();
        foreach ($order->items() as $item) {
            $item->append('total_format');
        };
        dump($order->toArray());
    }


    public function append()
    {
        $order = Order::query()->where('total', '>', 0)->first();
        $order->append('total_format');
        dump($order->toArray(), $order->total_format);
    }

    public function virtual()
    {
        $order = Order::query()->where('total', '>', 0)->first();
        $order->setAppends(['total_format']);
        dump($order->toArray(), $order->total_format);
    }

    public function default()
    {
        $order = Order::query()->find(5);
        dump($order->options);
    }
}
