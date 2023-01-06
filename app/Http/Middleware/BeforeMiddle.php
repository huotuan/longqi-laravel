<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class BeforeMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $uid, $limit = 5)
    {
        // todo ,处理逻辑
        $request->merge([
            'request_id' => time(),
            'limit' => $limit,
            'uid' => $uid,
        ]);

//        $this->limit($request);
//        $this->reply($request);

        return $next($request);
    }

    public function validaToken(Request $request)
    {
        throw_if($request->headers->has('token'), new \Exception('error token'));
        $token = $request->headers->all()['token'][0];

        $localToken = '111111';
        throw_if($token != $localToken, new \Exception('error token'));
    }

    public function reply(Request $request)
    {
        $key = md5($request->url() . json_encode($request->all()));
        $lock = Cache::lock($key);
        throw_if(!$lock->get(), new \Exception('too many request.'));
    }

    public function limit(Request $request)
    {
        $redis = Redis::connection()->client();
        $key = md5($request->ip());
        if ($redis->setnx($key, 1)) {
            $redis->expire($key, 60);
        } else {
            $redis->sAdd($key, 1);
        }

        throw_if($redis->get($key) >= 0, new \Exception('too many request.'));
    }
}
