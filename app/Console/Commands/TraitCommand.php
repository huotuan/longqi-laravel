<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class TraitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boot_trait';

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
        $this->delete();

        return CommandAlias::SUCCESS;
    }

    public function delete()
    {
        $post = Post::query()->has('image')->first();
        dump($post->id, $post->image->id);
        $post->delete();
    }
}
