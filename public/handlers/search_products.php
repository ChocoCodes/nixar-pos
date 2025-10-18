<?php 
    include_once __DIR__ . '/../../includes/config/_init.php';  
    include_once 'check_session.php';

    checkSession();
    // Let the browser know that we are sending JSON as response
    header("Content-Type: application/json");

    $Conn = DatabaseConnection::getInstance()->getConnection();

    $Query = isset($_GET['q']) ? InputValidator::sanitizeData($_GET['q']) : '';
    if($Query === '') {
        echo json_encode([]);
        exit;
    }

    $Inventory = new Inventory($Conn);
    $Rows = $Inventory->searchInventoryByKeyword($Query);

    echo json_encode($Rows);
    exit;
?>