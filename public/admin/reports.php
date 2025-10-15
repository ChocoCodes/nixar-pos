<?php 
    include_once __DIR__ . '/../handlers/check_session.php';
    
    $PageTitle = "Dashboard | NIXAR POS";
    $CssPath = "../assets/css/styles.css";
    $JSPath = "../assets/js/scripts.js";

    include_once '../../includes/head.php'; 
    include_once '../../includes/components/nav.php';
    checkSession();
?>

<?php

require_once __DIR__ . '/../../includes/config/DatabaseConnection.php'; 
$dbInstance = DatabaseConnection::getInstance();
$conn = $dbInstance->getConnection();

//dates
$start_date = $_POST['start_date'] ?? date('Y-m-01'); 
$end_date   = $_POST['end_date'] ?? date('Y-m-d');

//inventory data
$inventory_data = [];
if (isset($_POST['generate'])) {
  $sql = "SELECT current_stock, min_threshold, updated_at 
          FROM inventory
          WHERE DATE(updated_at) BETWEEN ? AND ?
          ORDER BY updated_at DESC";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $start_date, $end_date);
  $stmt->execute();
  $result = $stmt->get_result();
  $inventory_data = $result->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reports | Nixar Auto Glass & Car Tint</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
    }
    .report-container {
      margin: 40px auto;
      width: 90%;
      max-width: 1200px;
      background-color: white;
      border-radius: 12px;
      padding: 20px 30px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .date-input {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .report-tabs {
      margin-top: 20px;
    }
    .report-tabs .btn {
      border: none;
      background: none;
      font-weight: bold;
      font-size: 18px;
      color: #000;
    }
    .report-tabs .btn.active {
      color: #b92b2b;
    }
    .report-display {
      background: #f1f1f1;
      min-height: 400px;
      border-radius: 10px;
      margin-top: 20px;
      padding: 20px;
      overflow-x: auto;
    }
    .generate-btn {
      background-color: #b92b2b;
      border: none;
      color: white;
      padding: 8px 20px;
      border-radius: 6px;
    }
  </style>
</head>
<body>

<div class="report-container">
  <form method="POST" action="">
    <div class="d-flex align-items-center gap-3">
      <div class="date-input">
        <input type="date" name="start_date" class="form-control" value="<?php echo $start_date; ?>">
        <span>to</span>
        <input type="date" name="end_date" class="form-control" value="<?php echo $end_date; ?>">
      </div>
      <button type="submit" name="generate" class="generate-btn">Generate Report</button>
    </div>
  </form>

  <div class="report-tabs mt-4">
    <button type="button" class="btn" id="salesBtn">📄 Sales Report</button>
    <button type="button" class="btn active" id="inventoryBtn">📦 Inventory Report</button>
    <button type="button" class="btn" id="financialBtn">💲 Financial Report</button>
  </div>

  <div class="report-display" id="reportArea">
    <?php if (isset($_POST['generate'])): ?>
      <h5>Inventory Report (<?php echo htmlspecialchars($start_date); ?> to <?php echo htmlspecialchars($end_date); ?>)</h5>
      <?php if (!empty($inventory_data)): ?>
        <table class="table table-striped mt-3">
          <thead class="table-danger">
            <tr>
              <th>Current Stock</th>
              <th>Min Threshold</th>
              <th>Last Updated</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($inventory_data as $row): ?>
              <tr>
                <td><?php echo htmlspecialchars($row['current_stock']); ?></td>
                <td><?php echo htmlspecialchars($row['min_threshold']); ?></td>
                <td><?php echo htmlspecialchars($row['updated_at']); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <p class="mt-3 text-muted">No inventory records found for this date range.</p>
      <?php endif; ?>
    <?php else: ?>
      <p class="text-muted">Select a date range and click <b>Generate Report</b> to view inventory data.</p>
    <?php endif; ?>
  </div>
</div>

<script>
  const salesBtn = document.getElementById("salesBtn");
  const inventoryBtn = document.getElementById("inventoryBtn");
  const financialBtn = document.getElementById("financialBtn");
  const reportArea = document.getElementById("reportArea");

  function clearActive() {
    [salesBtn, inventoryBtn, financialBtn].forEach(btn => btn.classList.remove("active"));
  }

  salesBtn.onclick = () => {
    clearActive();
    salesBtn.classList.add("active");
    reportArea.innerHTML = "<p>No sales recorded for the selected period.</p>";
  }

  inventoryBtn.onclick = () => {
    clearActive();
    inventoryBtn.classList.add("active");
    reportArea.innerHTML = `<p>Reloading Inventory Report...</p>`;
    setTimeout(() => location.reload(), 400);
  }

  financialBtn.onclick = () => {
    clearActive();
    financialBtn.classList.add("active");
    reportArea.innerHTML = "<p>No finances recorded for the selected period</p>";
  }
</script>

</body>
</html>
