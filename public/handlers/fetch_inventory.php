<?php 
    include_once __DIR__ . '/../../includes/config/_init.php';  
    include_once 'check_session.php';

    checkSession();

    $Conn = DatabaseConnection::getInstance()->getConnection();
    $Inventory = new Inventory($Conn);

    $Limit = isset($_GET['limit']) ? (int)InputValidator::sanitizeData($_GET['limit']) : 10;
    $Page = isset($_GET['page']) ? (int)InputValidator::sanitizeData($_GET['page']) : 1;
    $Offset = ($Page - 1) * $Limit;

    $InventoryData = $Inventory->fetchInventory($Limit, $Offset);
    $TotalProducts = $Inventory->getInventoryCount();

    $TotalPages = ceil($TotalProducts / $Limit);

    $Response = [
        'inventory' => $InventoryData,
        'totalPages' => $TotalPages,
        'currentPage' => $Page
    ];

    header("Content-Type: application/json");
    echo json_encode($Response);
?>