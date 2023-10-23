<?php
    class Connection extends PDO {
        public function __construct(string $host, string $dbname, int $port, string $user, string $pass) {
            try {
                parent::__construct("mysql:host=$host;dbname=$dbname;port=$port", $user, $pass);
                $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $e;
            }
        }
    }
?>