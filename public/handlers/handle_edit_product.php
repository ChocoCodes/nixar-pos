<?php 
    header("Content-Type: application/json");
    include_once __DIR__ . '/../../includes/config/_init.php';  
    SessionManager::checkSession();

    $Conn = DatabaseConnection::getInstance()->getConnection();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Sanitized = InputValidator::sanitizeArray($_POST);
        
        $Image = $_FILES['product_image'] ?? null;
        $ProductName = $Sanitized['product_name'];
        $ProductSku = $Sanitized['nixar_product_sku'];
        $MaterialId = $Sanitized['product_material_id'];
        $Stocks = $Sanitized['stock_count'];
        $Threshold = $Sanitized['min_threshold'];
        $MarkUp = $Sanitized['mark_up'];
        $SupplierId = $Sanitized['product_supplier_id'];
        $SupplierBasePrice = $Sanitized['base_price'];


    }

?>