<?php 
    class Supplier {
        private mysqli $Conn;

        public function __construct(mysqli $Conn) {
            $this->Conn = $Conn;
        }

        public function fetchAll() {
            $Sql = "SELECT * FROM suppliers";
            $Result = $this->Conn->query($Sql);
            if (!$Result) {
                throw new Exception('Failed to execute query: ' . $this->Conn->error);
            }
            return $Result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>