<?php 
    /* database connection class*/
    class db_connect{
        public $host = "host = 127.0.0.1";
		public $credentials="user = dbadmin password=Abc123Abc123";
		public $name = "dbname = php_postgres_testing_01";
        public $port = "port = 5432";
		public $conn;
		public $error;

        public function connect(){
            $this->conn = pg_pconnect("$this->host $this->credentials $this->name $this->port");
            if(!$this->conn){
				$this->error="Fatal Error: Can't connect to database";
				return false;
			}
            else{
                /*
                echo "Database connected successfully!\n";
              */  
            }
        }
    }
?>
