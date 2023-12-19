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
        $this->chunk();

        return CommandAlias::SUCCESS;
    }

    public function basic()
    {
        Order::query()->toBase(1)->first();
        Order::query()->whereEmail('like', '@')->first();
        Order::query()->where('email', 'like', '@')->first();

        Order::query()->firstOr(function () {
            return new Order(['id' => 1]);
        });

        $order = Order::query()->firstOrNew(['name' => 1111]);
        $order->save();
        $order = Order::query()->firstOrCreate(['name' => 1111]);
    }

    public function chunk()
    {

//        Order::query()->where('status',1)->chunk(100,function ($orders){
//            foreach ($orders as $order) {
//                Order::query()->where('id',$order)->update(['status' =>2]);
//            }
//        });

        Order::query()->chunkById(100, function ($orders) {
            foreach ($orders as $order) {
                dump($order->id);
            }
        });

        Order::query()->lazyById(100)->each(function ($order) {
            dump($order->id);
        });

//        Order::query()->cursor(100)->each(function ($order){
//            dump($order->id);
//        });
    }

    public function has()
    {
        $user = User::query()->whereHas('orders')->get();
        $user = User::query()->whereExists(function (Builder $query) {
            return $query->select(DB::raw('1'))->from('orders')->whereColumn('orders.user_id', 'users.id');
        })->get();

        $user = User::query()->where(function ($query) {
            $query->select('store_id')->from('orders')->whereColumn('orders.user_id', 'users.id')->latest()->take(1);
        }, 2)->get();
    }

    public function addSelect()
    {
        $users = User::query()->select(['id', 'name'])->addSelect([
            'last_order_at' => Order::query()->select('created_at')->whereColumn('orders.user_id', 'users.id')->latest()->take(1),
        ])->limit(10)->get();
        dump($users->toArray());

        $users = User::query()->select(['id', 'name'])->addSelect([
            'last_order_at' => Order::query()->select('created_at')->whereColumn('orders.user_id', 'users.id')->latest()->take(1),
        ])->orderByDesc(
           Order::query()->select('created_at')->whereColumn('orders.user_id', 'users.id')->latest()->take(1)
       )->limit(10)->get();
        dump($users->toArray());

        $orders = Order::query()->select(['id', 'total'])->addSelect(DB::raw('total*0.01 as total_format'))->limit(10)->get();
        dump($orders->toArray());

        $users = User::query()->select(['id', 'name'])->addSelect([
            'last_order_at' => Order::query()->selectRaw('max(created_at)')->whereColumn('orders.user_id', 'users.id'),
        ])->limit(10)->get();
        dump($users->toArray());
    }

    public function whereIn()
    {
        $users = User::query()->whereHas('orders', function ($query) {
            return $query->where('title', 'like', '%先生%');
        })->get();

        $users = User::query()->with()->whereIn('id', function ($query) {
            return $query->select('user_id')->from('orders')->where('title', 'like', '%先生%');
        })->get();

        $users = User::query()->whereIn('id', Order::query()->where('title', 'like', '%先生%')->pluck('id'))->get();
    }
}
