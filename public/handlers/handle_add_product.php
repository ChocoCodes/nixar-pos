<?php 
    header("Content-Type: application/json");
    include_once __DIR__ . '/../../includes/config/_init.php';  
    SessionManager::checkSession();

    $Conn = DatabaseConnection::getInstance()->getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Sanitized = InputValidator::sanitizeArray($_POST);
        // Product Information
        $Image = $_FILES['product_image'] ?? null;
        $ProductName = $Sanitized['product_name'];
        $ProductSku = $Sanitized['product_sku'];
        $Material = $Sanitized['product_material'];
        $CarType = $Sanitized['car_type'];
        $StockCount = $Sanitized['stock_count'];
        $Markup = $Sanitized['mark_up'];
        $SupplierId = $Sanitized['product_supplier_id'];
        $BasePrice = $Sanitized['base_price'];
        // Car Compatibility
        $CarMake = $_POST['car_make'];
        $CarModel = $_POST['car_model'];
        $CarYear = $_POST['car_year'];
        // Transform Car Details into an array
        $CompatibleCars = [];
        for($I = 0; $I < count($CarMake); $I++) {
            $CompatibleCars[] = [
                'make' => $CarMake[$I],
                'model' => $CarModel[$I],
                'year' => $CarYear[$I],
                'type' => $CarType
            ];
        }
        // Save image to `../assets/img/uploads/` and store base image url
        $UploadFileName = null;
        if ($Image && $Image['error'] === 0) {
            $Dir = __DIR__ . '/../assets/img/uploads/';
            $ImgPath = basename($Image['name']);
            $FileName = time(). '_' . uniqid() . '_' . $ImgPath;
            $SavePath = "{$Dir}{$Filename}";
            // Save image to `public/img/uploads`
            if(move_uploaded_file($Image['tmp_name'], $SavePath)) {
                $UploadFileName = $FileName;
            }
        }
        // begin transaction
        $Conn->autocommit(false);
        try {
            $Conn->begin_transaction();
            // Insert supplier info
            // insert car models
            // Insert Product Compatibility
            // insert product information
            // commit if success, else rollback
            echo json_encode(['success' => true, 'message' => 'Product successfully added']);
        } catch (Exception $E) {
            $Conn->rollback();
            echo json_encode(['success' => false, 'message' => $E->getMessage()]);
        } finally {
            $Conn->autocommit(true);
        }
    }
?>