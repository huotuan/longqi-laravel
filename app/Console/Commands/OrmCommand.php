<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class OrmCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orm';

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
        $this->query();
        return Command::SUCCESS;
    }

    public function query()
    {
//        User::query()->whereId(1)->first();
       $user =  User::query()->whereEmail('optio_et@example.com')->first();
       dd($user->toArray());
//        User::query()->whereName(1)->first();
    }
}
