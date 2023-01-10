<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Command\Command as CommandAlias;

class QueryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'query';

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
        $this->whereIn();

        return CommandAlias::SUCCESS;
    }

    public function toBase()
    {
        $order = Order::query()->toBase()->inRandomOrder()->first();
        $order2 = Order::query()->inRandomOrder()->first();
        dump($order, $order2);
    }

    public function whereIn()
    {
        $query = Order::query();
        $orders = (clone $query)->whereHas('user', function ($query) {
            return $query->where('name', 'like', '%吴%');
        })->get();
        dump($orders);
        $orders = (clone $query)->whereIn('user_id', function ($query) {
            return $query->select('id')->from('users')->where('name', 'like', '%许文%');
        })->get();

        $orders = (clone $query)->whereIn('user_id', Order::query()->where('name', 'like', '%许文%')->pluck('id'))
            ->get();

        dump($orders);
    }

    public function addSelect()
    {
        $query = Order::query()->where('store_id', 2)->select(['id', 'total', 'store_id']);
        $query->addSelect('status');
        dump($query->get());

        $query = Order::query()->where('store_id', 2)->select(['id', 'total', 'store_id']);
        $query->addSelect(DB::raw('total *0.01 as total_format'));
        dump($query->get()->toArray());

        $users = User::query()->addSelect([
            'last_order_at' => Order::query()->select('created_at')->whereColumn('users.id', 'orders.user_id')->orderByDesc('created_at')->take(1),
        ])->limit(10)->get();
        dump($users->toArray());

        $users = User::query()
            ->addSelect([
                'last_order_at' => Order::query()->select('created_at')->whereColumn('users.id', 'orders.user_id')->orderByDesc('created_at')->take(1),
            ])
            ->orderByDesc(
                Order::query()->select('created_at')->whereColumn('users.id', 'orders.user_id')->orderByDesc('created_at')->limit(1)
            )->limit(10)->get();

        dump($users->toArray());
    }

    public function where()
    {
        dump(User::where(function ($query) {
            $query->select('store_id')
                ->from('orders')
                ->whereColumn('orders.user_id', 'users.id')
                ->orderByDesc('orders.created_at')
                ->limit(1);
        }, '2')->get()->toJson());
    }

    public function exists()
    {
        Order::query()->whereExists(function (Builder $query) {
            return $query->select(DB::raw(1))
                ->from('users')
                ->whereColumn('orders.user_id', 'users.id');
        })->first();
    }

    public function has()
    {
        Order::query()->has('user')->first();
    }

    public function lazy()
    {
        Order::query()->lazyById(10)->each(function ($order) {
            dump($order->id);
            dump($order);
        });
    }

    public function chunk()
    {
        Order::query()->chunkById(10, function ($orders) {
            dump('-----------');
            foreach ($orders as $order) {
                dump($order->id);
                dump($order);
            }
        });
    }
}