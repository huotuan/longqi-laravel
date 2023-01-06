<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete';

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
        // 今天
        $today = now()->format('Y-m-d');
        $queryLog = storage_path('logs/' . sprintf('%s_query.log', $today));
        $log = storage_path('logs/' . sprintf('laravel-%s.log', $today));
        $log2 = storage_path('logs/' . sprintf('debug_%s.log', $today));
        @unlink($queryLog);
        @unlink($log);
        @unlink($log2);

        $yesterday = now()->subDay()->format('Y-m-d');
        $queryLog = storage_path('logs/' . sprintf('%s_query.log', $yesterday));
        $log = storage_path('logs/' . sprintf('laravel-%s.log', $yesterday));
        $log2 = storage_path('logs/' . sprintf('debug_%s.log', $today));
        @unlink($queryLog);
        @unlink($log);
        @unlink($log2);

        $yesterday = now()->subDays(2)->format('Y-m-d');
        $queryLog = storage_path('logs/' . sprintf('%s_query.log', $yesterday));
        $log = storage_path('logs/' . sprintf('laravel-%s.log', $yesterday));
        $log2 = storage_path('logs/' . sprintf('debug_%s.log', $today));
        @unlink($queryLog);
        @unlink($log);
        @unlink($log2);

        $yesterday = now()->subDays(3)->format('Y-m-d');
        $queryLog = storage_path('logs/' . sprintf('%s_query.log', $yesterday));
        $log = storage_path('logs/' . sprintf('laravel-%s.log', $yesterday));
        $log2 = storage_path('logs/' . sprintf('debug_%s.log', $today));
        @unlink($queryLog);
        @unlink($log);

        $yesterday = now()->subDays(4)->format('Y-m-d');
        $queryLog = storage_path('logs/' . sprintf('%s_query.log', $yesterday));
        $log = storage_path('logs/' . sprintf('laravel-%s.log', $yesterday));
        $log2 = storage_path('logs/' . sprintf('debug_%s.log', $today));
        @unlink($queryLog);
        @unlink($log);
        @unlink($log2);

        $yesterday = now()->subDays(5)->format('Y-m-d');
        $queryLog = storage_path('logs/' . sprintf('%s_query.log', $yesterday));
        $log = storage_path('logs/' . sprintf('laravel-%s.log', $yesterday));
        $log2 = storage_path('logs/' . sprintf('debug_%s.log', $today));
        @unlink($queryLog);
        @unlink($log);
        @unlink($log2);

        $yesterday = now()->subDays(6)->format('Y-m-d');
        $queryLog = storage_path('logs/' . sprintf('%s_query.log', $yesterday));
        $log = storage_path('logs/' . sprintf('laravel-%s.log', $yesterday));
        $log2 = storage_path('logs/' . sprintf('debug_%s.log', $today));
        @unlink($queryLog);
        @unlink($log);
        @unlink($log2);

        $yesterday = now()->subDays(7)->format('Y-m-d');
        $queryLog = storage_path('logs/' . sprintf('%s_query.log', $yesterday));
        $log = storage_path('logs/' . sprintf('laravel-%s.log', $yesterday));
        $log2 = storage_path('logs/' . sprintf('debug_%s.log', $today));
        @unlink($queryLog);
        @unlink($log);
        @unlink($log2);

        $yesterday = now()->subDays(8)->format('Y-m-d');
        $queryLog = storage_path('logs/' . sprintf('%s_query.log', $yesterday));
        $log = storage_path('logs/' . sprintf('laravel-%s.log', $yesterday));
        $log2 = storage_path('logs/' . sprintf('debug_%s.log', $today));
        @unlink($queryLog);
        @unlink($log);
        @unlink($log2);

        $yesterday = now()->subDays(9)->format('Y-m-d');
        $queryLog = storage_path('logs/' . sprintf('%s_query.log', $yesterday));
        $log = storage_path('logs/' . sprintf('laravel-%s.log', $yesterday));
        $log2 = storage_path('logs/' . sprintf('debug_%s.log', $today));
        @unlink($queryLog);
        @unlink($log);
        @unlink($log2);

        $log = storage_path('logs/laravel.log');
        @unlink($log);

        $log = storage_path('logs/point.log');
        @unlink($log);

        $log = storage_path('logs/pointlog.log');
        @unlink($log);

        $log = storage_path('logs/rabbitMq.log');
        @unlink($log);

        $log = storage_path('logs/debugpointbalance.log');
        @unlink($log);

        $log = storage_path('logs/pointlog.log');
        @unlink($log);

        return 0;
    }
}
