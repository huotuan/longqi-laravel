<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Faker\Generator;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class EventCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event';

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
        $this->withoutEvent();
        return CommandAlias::SUCCESS;
    }

    public function created()
    {

    }

    public function withoutEvent()
    {

    }
}
