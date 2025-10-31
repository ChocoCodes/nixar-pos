<?php
    header("Content-Type: application/json");

    include_once __DIR__ . '/../../includes/config/_init.php';  
    SessionManager::checkSession();

    $Conn = DatabaseConnection::getInstance()->getConnection();

    
?>