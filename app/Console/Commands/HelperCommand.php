<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use App\Services\UserService;
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

        /** 调试相关 */
        // dd
        // dump('hello',['hello','world'=>'zh']);
        // dd('hello',['hello','world'=>'zh']);

        info('info', ['hello', 'world' => 'zh']);
        logger('logger', ['hello', 'world' => 'zh']);
        logger()->error('You are not allowed here.');

        // 辅助判断
        $blank = null;
        $params = null;
        $id = '2';
        $name = 'John';
//        $this->info( 'blank:'.blank($blank));
//        $this->info( 'filled:'.filled($blank));

        /** 对象操作相关 */
        // https://learnku.com/docs/laravel/9.x/facades/12208
        // app('log')->info('app info',['hello','world'=>'zh']);
        // app('redis')->setnx('ddd',1);
        // echo  app('redis')->get('ddd');

//        app(UserService::class)->find(1);
//        app(PostService::class,['id'=>3])->find();
//
        with(new UserService())->find(1);
        with(new PostService(4))->find();

        dump(with($params, function ($params) {
            if ($params == null) {
                return 'with hello';
            }

            return $params;
        }));

        $callable = function ($name) {
            echo $name . PHP_EOL;
        };
        with($name, $callable);

        dump(value(function () {
            [$id, $name] = func_get_args();

            return $id . $name;
        }, $id, $name));

        dump(value(function () use ($id, $name) {
            return $id . $name;
        }, $id, $name));

        dump(value(function ($id, $name) {
            return $name . $id;
        }, $id, $name));

        $user = new User(['id' => 999, 'email' => 'hello@qq.com']);

        dump($user->name);
        dump(optional($user)->name);

        dump(optional($user, function ($user) {
            return $user->name;
        }));

        dump(tap(User::first(), function (User $user) {
            dump($user->email);
            $user->update(['email' => $user->email . now()->toDateTimeString()]);
        })->email);

        dump(tap(User::first())->update(['email' => now()->toDateTimeString()])->email);

        dump(transform('call', $callable));

        /** object_get */
        $this->info(isset($user['name']));
        $this->info(object_get($user, 'name2.post.name', 'zhangsan'));
        $this->info($user->name2->post ?? 'zhangsan');

        /** 对象操作相关 */

        /** 集合相关 */

        dump(Post::with('image')->limit(10)->get()->toArray());
        dump(Post::with('image')->limit(10)->get()->pluck('image')->toArray());
        dump(Post::with('image')->limit(10)->get()->pluck('image')->collapse()->toArray());

        /* */
//        retry(10, function () {
//            $corpNo = random_int(100000000, 999999999);
//            if (CorpAuth::query()->where('corp_no', $corpNo)->first()) {
//                throw new \Exception('corp_no make failed');
//            }
//
//            return $corpNo;
//        }, 100);
        return CommandAlias::SUCCESS;
    }
}
