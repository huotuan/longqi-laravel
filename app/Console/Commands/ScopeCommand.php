<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Scopes\StoreScope;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class ScopeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scope';

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
        Order::query()->withoutGlobalScope('complete')->inRandomOrder()->pending()->ofUser(1)
            ->limit(10)->pluck('status')->toArray();
        Order::query()->withoutGlobalScopes([StoreScope::class])->withoutGlobalScope('complete')
            ->inRandomOrder()->ofUser(2)->limit(10)->dd();

        Order::query()->withoutGlobalScopes([StoreScope::class])->inRandomOrder()
            ->limit(10)->pluck('store_id')->toArray();
        Order::query()->withoutGlobalScope(StoreScope::class)->inRandomOrder()
            ->limit(10)->pluck('store_id')->toArray();
        Order::query()->inRandomOrder()->limit(10)->pluck('status')->toArray();
        Order::query()->withoutGlobalScope('complete')->inRandomOrder()
            ->limit(10)->pluck('status')->toArray();
        Order::query()->inRandomOrder()->limit(10)->pluck('store_id')->toArray();

        return CommandAlias::SUCCESS;
    }
}
