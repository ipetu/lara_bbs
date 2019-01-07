<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;

class ImportHKBusInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:businfo';

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
     * @return mixed
     */
    public function handle()
    {
        //
//        DB::unprepared(file_get_contents("database/migrations/larabbs_2019-01-04.sql"));
    }
}
