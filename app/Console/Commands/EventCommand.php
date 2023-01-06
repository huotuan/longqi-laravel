<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
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
        $this->withOutEvent();
        return CommandAlias::SUCCESS;
    }

    public function creating()
    {
        Tag::query()->create(['name' => 'red']);
    }

    public function withOutEvent()
    {

//        $tag = Tag::query()->inRandomOrder()->first();
//        $tag->name .= now()->toDateTimeString();
//        $tag->saveQuietly();


//        $tag = Tag::query()->inRandomOrder()->update(['name'=>mt_rand(1,9999)]);
//        $tag = Tag::query()->where('id','<=')->update(['name'=>mt_rand(1,9999)]);

//        Tag::withoutEvents(function (){
//            $tag = Tag::query()->inRandomOrder()->first();
//            $tag->name .= now()->toDateTimeString();
//            $tag->saveQuietly();
//        });
    }
}
