<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class OrmSyncCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync';

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
        $this->detach();
        return CommandAlias::SUCCESS;
    }

    public function sync()
    {
        $user = User::query()->where('id',4)->first();
        $user->roles()->sync(Role::query()->pluck('id'));
        dump($user->id,$user->roles->pluck('id'));
    }

    public function attach()
    {
        $user = User::query()->where('id',4)->first();
        $user->roles()->attach(Role::query()->pluck('id'));
        dump($user->id,$user->roles->pluck('id'));
    }

    public function detach()
    {
        $user = User::query()->where('id',4)->first();
        $user->roles()->detach(Role::query()->pluck('id'));
        dump($user->id,$user->roles->pluck('id'));
    }


    public function associate()
    {
        $user = User::query()->inRandomOrder()->first();
        $role = Role::query()->inRandomOrder()->first();
    }

}
