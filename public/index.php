<?php include_once '../includes/head.php'; ?>
<?php echo "admin123 " . password_hash('admin123', PASSWORD_DEFAULT) . "<br>"; ?>
<?php echo "cashier123 " . password_hash('cashier123', PASSWORD_DEFAULT); ?>
<?php include_once '../includes/footer.php'; ?>