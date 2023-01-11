<?php

namespace App\Console\Commands;

use App\Models\Order;
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

    }

    public function trait()
    {
    }

    public function cast()
    {
    }

    /**
     * @Desc toBase/withoutScope
     * @Author zhanglongfei
     * @Date 2023/1/11 10:01
     */
    public function scope()
    {
    }
}
