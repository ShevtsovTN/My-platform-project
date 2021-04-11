<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class IsOnline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users_online_check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check users online';

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
     * @return void
     */
    public function handle()
    {
        $this->info('Checking users process started');
        $timeline = date('Y-m-d H:i:s', mktime(date("H"), date("i") - 1, date("s"), date("m")  , date("d"), date("Y")));
        User::where('updated_at', '<', $timeline)->update([
            'online' => 0
        ]);
        $this->info('Checking users process finished');
    }
}
