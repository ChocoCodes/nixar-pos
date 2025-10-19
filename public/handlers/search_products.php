<?php 
    include_once __DIR__ . '/../../includes/config/_init.php';  
    include_once 'check_session.php';

    checkSession();

    $Conn = DatabaseConnection::getInstance()->getConnection();

    $Query = isset($_GET['q']) ? InputValidator::sanitizeData($_GET['q']) : '';
    if($Query === '') {
        echo json_encode([]);
        exit;
    }

    $Limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
    $Page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $Offset = ($Page - 1) * $Limit;

    $Inventory = new Inventory($Conn);
    $Rows = $Inventory->searchInventoryByKeyword($Query, $Limit, $Offset);
    $Count = $Inventory->countBySearchKeyword($Query);
    $TotalPages = ceil($Count / $Limit);

    $Response = [
        'inventory' => $Rows,
        'totalPages' => $TotalPages,
        'currentPage' => $Page
    ];
    // Let the browser know that we are sending JSON as response
    header("Content-Type: application/json");
    echo json_encode($Response);
?>