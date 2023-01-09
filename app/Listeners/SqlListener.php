<?php

namespace App\Listeners;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class SqlListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        $logger = new Logger('');
        $logger->pushHandler(new StreamHandler(storage_path() . '/logs/' . date('Y-m-d') . '_query.log'));
        $query = str_replace('?', "'%s'", $event->sql);
        $query = vsprintf($query, $event->bindings) . ' ----time: ' . $event->time . 'ms';
        $logger->info($query);
    }
}
