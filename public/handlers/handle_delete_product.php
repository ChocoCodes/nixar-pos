<?php 
    include_once __DIR__ . '/../../includes/config/_init.php';  
    SessionManager::checkSession();

    $Conn = DatabaseConnection::getInstance()->getConnection();
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $Product = new NixarProduct($Conn);
        $ProductSku = $_POST['productId'];

        $Result = $Product->remove($ProductSku);

        echo json_encode($Result);
    }
?>