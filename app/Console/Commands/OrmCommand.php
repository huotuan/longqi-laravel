<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\User;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class OrmCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orm';

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
        $this->basic();

        return CommandAlias::SUCCESS;
    }

    /*
     * setAppends/append
     */
    public function basic()
    {
        $order = Order::query()->withoutGlobalScopes()->find(1);
        dd(1);
        $order = Order::query()->find(1);
        $order->setAppends(['total_format']);
        dump($order->total_format, $order->toArray());
        $order->append('total_format');
        dump($order->total_format, $order->toArray());
        $order = Order::query()->paginate(10);
        foreach ($order->items() as $item) {
            $item->setAppends(['total_format']);
        }
    }

    public function trait()
    {
        $user = User::query()->whereId(2)->first();
        $user->delete();
    }

    public function cast()
    {
    }

    public function scope()
    {
        Order::query()->inRandomOrder()->get();
        Order::query()->withoutGlobalScopes()->inRandomOrder()->first();
    }
}
