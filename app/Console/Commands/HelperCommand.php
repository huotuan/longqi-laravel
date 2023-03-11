<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\PostService;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class HelperCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'helper';

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
        // dd
//        User::first()->dump();
//        User::first()->dd();

        // collect
//        $array = [
//            ['id'=>1,'name'=>'white'],
//            ['id'=>2,'name'=>'red'],
//        ];

//        collect($array)->dump();
//        collect($array)->pluck('id')->dump();
//        collect($array)->each(function ($item){
//            dump($item);
//            return $item;
//        });

        // value
//        $callable = function (){
//          $param = func_get_args();
//          dump($param);
//        };
//
//        value($callable,1,2,3);

        // app
//        app(PostService::class)->find();
//        app(PostService::class,['id'=>23])->find();
//        app(PostService::class,['id2'=>23])->fid();
//        $key = 'app_cache';
//        app('cache')->set($key, 1);
//        dump(app('cache')->get($key));

        // dispatch
//        dispatch(new Demo)->onQueue()->onConnection()->delay();

        // now
//        $now = now();
//        dump($now->toDateTimeString());
//        dump($now->addHour()->toDateTimeString());
//        dump($now->toDateTimeString());


        // blank
//        $blank = '';
//        $empty = null;
//        $emptyArr = [];
//        $emptyCollection = collect([]);
//        dump(blank($blank));
//        dump(blank($empty));
//        dump(blank($emptyArr));
//        dump(blank($emptyCollection));

        // optional
//        $user = null;
//        dump(optional($user)->id);
//        dump(optional($user)['id']);
//        dump(optional($user,function (&$user){
//
//            $user['id']=2;
//        })['id']);
//        optional(User::query()->where('id',99999)->first())->name;
//        dump($user?->name);


        return CommandAlias::SUCCESS;
    }
}
