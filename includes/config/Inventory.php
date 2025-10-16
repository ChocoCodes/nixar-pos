<?php 
    class Inventory {
        private mysqli $Conn;

        public function __construct(mysqli $Conn) {
            $this->Conn = $Conn;
        }

        // TODO: fetchInventory
        public function fetchInventory($Limit = 10, $Offset = 0) {
            $Sql = "SELECT * FROM product_inventory_view ORDER BY current_stock DESC, final_price ASC LIMIT ?, ?";
            $Stmt = $this->Conn->prepare($Sql);
            if(!$Stmt) {
                throw new Exception("Failed to execute query: ". $this->Conn->error);
            }
            $Stmt->bind_param("ii", $Offset, $Limit);
            $Stmt->execute();

            $Result = $Stmt->get_result();
            // Fetch all inventory data as an associative array
            $Rows = $Result->fetch_all(MYSQLI_ASSOC);
            // Free memory resources and return rows
            $Result->free();
            $Stmt->close();

            return $Rows;
        }

        public function getInventoryCount() {
            $Sql = "SELECT COUNT(*) AS total FROM product_inventory_view";
            $Result = $this->Conn->query($Sql);
            $Row = $Result->fetch_assoc();
            return $Row['total'];
        }
    }

?>