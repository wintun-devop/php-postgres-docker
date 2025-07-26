
<?php
require_once 'env.php';
loadEnv(__DIR__ . '/.env');

class db_connect {
    public $conn;
    public $error;

    public function connect() {
        $host = getenv('PG_HOST');
        $port = getenv('PG_PORT');
        $dbname = getenv('PG_DBNAME');
        $user = getenv('PG_USER');
        $pass = getenv('PG_PASS');

        $connectionString = "host=$host port=$port dbname=$dbname user=$user password=$pass";

        $this->conn = pg_pconnect($connectionString);

        if (!$this->conn) {
            $this->error = "Fatal Error: Can't connect to database";
            return false;
        } else {
            echo "Database connected successfully!\n";
        }
    }
}
?>




