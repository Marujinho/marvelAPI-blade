<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use PDO;
use PDOException;

class createMarvelDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marvel:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando cria o schema no banco de dados';

    // /**
    //  * Create a new command instance.
    //  *
    //  * @return void
    //  */
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
      $database = env('DB_DATABASE', false);

        if (! $database) {
            $this->info('Ops... Parece que o campo DB_DATABASE no arquivo .env está vazio :/');
            return;
        }

        $schemaName = env('DB_DATABASE') ?: config("database.connections.mysql.database");
        $charset = config("database.connections.mysql.charset",'utf8mb4');
        $collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');

        config(["database.connections.mysql.database" => null]);

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

        $result = DB::statement($query);

        if($result === false){
          $this->info('Ops... Ocorreu um erro ao criar a base de dados :/');
          return;
        }

        config(["database.connections.mysql.database" => $schemaName]);
        $this->info('Tabela foi criada com sucesso :)');
    }


    /**
     * @param  string $host
     * @param  integer $port
     * @param  string $username
     * @param  string $password
     * @return PDO
     */
    private function getPDOConnection($host, $port, $username, $password)
    {
        return new PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
