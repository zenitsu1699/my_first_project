<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;



class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a nex database file based in the env file.';

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
        echo "GETTING OF INFORMATION...\n";

        $schemaName = $this->argument('name') ?: config('database.connections.mysql.database');
        // $schemaName = $this->argument('name') ?: env('DB_DATABASE', 'forge');

        $charset = config('database.connections.mysql.charset', 'uft8mb4');

        $collation = config('database.connections.mysql.collation', 'utf8mb4_general.ci');

        config(['database.connections.mysql.database' => null]);

        echo "CREATION OF A NEW DATABASE...\n";

        $query = "DROP DATABASE $schemaName;";
        DB::statement($query);

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";
        DB::statement($query);

        echo "Database $schemaName created successfully";

        config(['database.connections.mysql.database' => $schemaName]);
    }
}
