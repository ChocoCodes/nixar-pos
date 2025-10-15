<?php 
    class NixarProduct {
        private mysqli $Conn;

        private function __construct(mysqli $Conn) {
            $this->Conn = $Conn;
        }
        public function fetchAll() {
            $Sql = "SELECT np.*, pm.*
                    FROM nixar_products np
                    JOIN product_materials pm
                    ON np.product_material_id = pm.product_material_id
                    WHERE np.is_deleted = 0";
            // Execute SQL Query
            $Result = $this->Conn->query($Sql);
            if(!$Result) {
                throw new Exception("Failed to execute query: ". $this->Conn->error);
            }
            // Fetch all product data as an associative array
            $Rows = $Result->fetch_all(MYSQLI_ASSOC);
            // Free memory resources and return rows
            $Result->free();

            return $Rows;
        }
        // TODO: updateInfo
        // remove
        public function remove(string $ProductSku) {
            $Sql = "UPDATE nixar_products 
                    SET is_deleted = 1 
                    WHERE nixar_product_sku = ?";
            $Stmt = $this->Conn->prepare($Sql);
            $Stmt->bind_param("s", $ProductSku);

            $Status = $Stmt->execute();
            if(!$Status) {
                throw new Exception("Failed to execute query: " . $this->Conn->error);
            }

            $Stmt->close();

            $UpdatedProducts = $this->fetchAll();
            return $UpdatedProducts;
        }
        // create
        public function create(array $ProductData) {
            $Sql = "INSERT INTO nixar_products(nixar_product_sku, product_material_id, product_name, product_image_url, mark_up) 
                    VALUES(?,?,?,?,?)";
            $Stmt = $this->Conn->prepare($Sql);
            $Stmt->bind_param(
                "sissd", 
                $ProductData['product_sku'], 
                $ProductData['material_id'], 
                $ProductData['product_name'], 
                $ProductData['image_url'],
                $ProductData['mark_up']
            );
            $Status = $Stmt->execute();
            $Stmt->close();

            return $Status;
        }
        // TODO: fetchInventory
        public function fetchInventory() {
            $Sql = "SELECT np.product_name,
                        cm.make,
                        cm.model,
                        cm.year,
                        cm.type,
                        pm.category,
                        i.stocks,
                        ps.base_price + (ps.base_price * np.mark_up / 100) AS final_price
                    FROM nixar_products np
                    JOIN product_compatibility pc ON np.nixar_product_sku = pc.nixar_product_sku
                    JOIN car_models cm ON pc.car_model_id = cm.car_model_id
                    JOIN product_materials pm ON np.product_material_id = pm.product_material_id
                    JOIN inventory i ON np.nixar_product_sku = i.nixar_product_sku
                    JOIN product_suppliers ps ON np.nixar_product_sku = ps.nixar_product_sku
                    WHERE np.is_deleted = 0
                    ORDER BY i.stocks DESC
                    ";
        }
    }

?>