<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AfterMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $data = $response->getContent();
        $data = json_decode($data,true);
        $data = Str::mask($data['request_id'],'*',5);
        $response->setContent(json_encode($data));

        $this->record($request,$response);
        return $response;
    }


    public function record(Request $request,$response)
    {
        info('record',[$request->all(),$request->url(),json_decode($response->getContent(),true)]);
    }
}
