<?php 
    include_once 'includes/config/_init.php';

    $Conn = DatabaseConnection::getInstance()->getConnection();

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        try {
            $Sanitized = InputValidator::sanitizeArray($_POST);
            $Username = $Sanitized['username'];
            $Password = $Sanitized['password'];
    
            $Sql = "SELECT * FROM users WHERE name = ?";
            $Stmt = $Conn->prepare($Sql); 
            $Stmt->bind_param("s", $Username);
            $Stmt->execute();
            
            $Result = $Stmt->get_result();
            if($Result->num_rows === 0) {
                throw new Exception("Username is not found.");
            }
    
            $User = $Result->fetch_assoc();
            if(!password_verify($Password, $User['password_hashed'])) {
                throw new Exception("Incorrect password.");
            }
    
            SessionManager::createUser($User['user_id'], $Username, $User['role']);
            
            switch($User['role']) {
                case 'admin': 
                    header('admin/dashboard.php');
                    break;
                case 'cashier':
                    header('cashier/pos.php');
                    break;
                default:
                    header('index.php');
                    break;
            }
            exit;
        } catch (Exception $E) {
            echo "<p>" . htmlspecialchars($E->getMessage()) . "</p>";
        }
    }
?>