<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Pipeline\Pipeline;
use Symfony\Component\Console\Command\Command as CommandAlias;

class ArrayReduce extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'array_reduce';

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

      $cart = ['id'=>1,'country'=>'US'];
      $shipping = function ($cart,\Closure $next){
         echo 'shipping';
          if($cart['country']=='US'){
              $cart['shipping'] = 'SF';
          }
          return $next($cart);
      };
        $point = function ($cart,\Closure $next){
            echo 'point';

            if($cart['id']==2){
                $cart['point'] = 10;
            }
            return $next($cart);
        };

        $coupon = function ($cart,\Closure $next){
            echo 'coupon';

            if($cart['country']=='US'){
                $cart['count'] = 10;
            }
            return $next($cart);
        };
        $pipeline = array_reduce([$shipping,$point,$coupon],[$this,'pipeline'],function ($passable){
            return $passable;
        });

        $cart = $pipeline($cart);
//        $cart = (new Pipeline)->send($cart)->through([$shipping,$point,$coupon])->via('handle')->pipe($shipping)->pipe()->thenReturn();
        dump($cart);
        return CommandAlias::SUCCESS;
    }

    public function fn1($param): \Closure
    {
         return function ()use($param){
             $this->info($param);
         };
    }

   public function pipeline($stack,$pipe){
        return function ($passable)use($stack,$pipe){
          if(is_callable($pipe)){
              return $pipe($passable,$stack);
          }

            throw  new Exception('error');
        };
   }
}
