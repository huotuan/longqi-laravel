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
        Order::query()->get()->each(function ($order) {
            return $order->append('total_format');
        });

        $order = Order::query()->find(5);
        $order->setAppends(['total_format']);
        dump($order->total, $order->total_format, $order->toArray());
    }

    public function append()
    {
        $order = Order::query()->find(5);
        $order->append('total_format');
        dump($order->total, $order->total_format, $order->toArray());
    }

    public function virtual()
    {
        $order = Order::query()->find(5);
        dump($order->total, $order->total_format, $order->toArray());
    }

    public function default()
    {
        $order = Order::query()->find(5);
        dump($order->options);
    }
}
