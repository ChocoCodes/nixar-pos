<?php 
    class NixarProduct {
        private mysqli $Conn;

        public function __construct(mysqli $Conn) {
            $this->Conn = $Conn;
        }
        public function fetchAll() {
            try {
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
            } catch (Exception $E) {
                return json_encode([
                    "status" => "error",
                    "message" => $E->getMessage()
                ]);
            }
        }
        // TODO: updateInfo
        // remove
        public function remove(string $ProductSku) {
            try {
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
            } catch (Exception $E) {
                return json_encode([
                    "status" => "error",
                    "message" => $E->getMessage()
                ]);
            }
        }
        // create
        public function create(array $ProductData) {
            try {
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
            } catch (Exception $E) {
                return json_encode([
                    "status" => "error",
                    "message" => $E->getMessage()
                ]);
            }
        }

        public function searchBySkuOrKeyword(string $Query, int $Limit, int $Offset) {
            try {
                $Like = "%{$Query}%";
                $Sql = "SELECT * FROM nixar_products 
                        WHERE nixar_product_sku LIKE ? 
                            OR product_name LIKE ?
                        LIMIT ? OFFSET ?";
                $Stmt = $this->Conn->prepare($Sql);
                $Stmt->bind_param("ssii", 
                    $Like, 
                    $Like,
                    $Limit,
                    $Offset
                );
                $Stmt->execute();
                $Result = $Stmt->get_result();
                $Rows = $Result->fetch_all(MYSQLI_ASSOC);
                $Stmt->close();
    
                return $Rows;
            } catch (Exception $E) {
                return json_encode([
                    "status" => "error",
                    "message" => $E->getMessage()
                ]);
            }
        }
    }

?>