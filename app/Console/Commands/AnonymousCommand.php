<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class AnonymousCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anonymous';

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

        $fn1 = function ($param){
          $this->info($param);
        };
        $param2='world';

        $fn2 = function ($param)use($param2){
            $this->info($param.' '.$param2);
        };
        // php 8+

        $fn3 = fn($param)=>'fn3'.$param;
        $fn1('hello');
        $fn2('hello');
        echo $fn3('hello');
        return CommandAlias::SUCCESS;
    }
}
