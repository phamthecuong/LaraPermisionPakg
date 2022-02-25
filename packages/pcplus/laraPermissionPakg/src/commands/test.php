<?php

namespace Pcplus\LaraPermissionPakg\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Pcplus\LaraPermissionPakg\models\role;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

       $user = User::find(1);

        dd($user->permissions()->sync(1));

        $role = role::findByName('CoppyWriter');

        dd($role->getPermissions());

        role::query()->create([
            'name' => 'CoppyWriter'
        ]);
        dd(1);
    }
}
