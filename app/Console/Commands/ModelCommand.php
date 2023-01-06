<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class ModelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model';

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
        $this->read();

        return CommandAlias::SUCCESS;
    }

    public function traitUser()
    {
        $this->info(Order::query()->with(['user'])->where('user_id', 1)->first()->toJson());
    }

    public function read()
    {
        dump(Order::query()->where('id', 211)->first()->snapshot);
    }

    public function create()
    {
        Order::query()->create([
            'user_id' => 1,
            'order_sn' => time(),
            'mobile' => 15800000000,
            'total' => 8898,
            'options' => json_encode(['sku' => 1]),
            'snapshot' => json_encode(['sku' => 1, 'product_id' => 2]),
        ]);
    }
}
