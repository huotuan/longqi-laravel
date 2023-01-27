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
        $this->created();

        return CommandAlias::SUCCESS;
    }

    public function created()
    {
        Tag::query()->create(['name' => app(Generator::class)->name]);
    }

    public function withoutEvent()
    {
        Tag::withoutEvents(function () {
            Tag::query()->create(['name' => app(Generator::class)->name]);
        });

        $tag = Tag::query()->find(1);
        $tag->name = '1';
        $tag->saveQuietly();

        $tag = Tag::query()->whereId(1)->update(['name' => 1]);
    }
}
