<?php 
    include_once __DIR__ . '/../../includes/config/_init.php';

    function checkSession() {
        SessionManager::getInstance();

        if (!SessionManager::has('logged_in') || SessionManager::get('logged_in') !== true) {
            header("Location: /nixar-pos/public/index.php");
            exit;
        }
    }
?>