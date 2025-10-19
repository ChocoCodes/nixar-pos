<?php 
  include_once __DIR__ . '/../handlers/check_session.php';
  
  $PageTitle = "Dashboard | NIXAR POS";
  $CssPath = "../assets/css/styles.css";
  $JSPath = "../assets/js/scripts.js";

  include_once '../../includes/head.php'; 
  include_once '../../includes/components/nav.php';

  require_once __DIR__ . '/../../includes/config/DatabaseConnection.php'; 
?>

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
<!-- =============== REPORT PAGE SPECIFIC SCRIPT =============== -->
<script src="../assets/js/reports.js?v=<?=filemtime('../assets/js/reports.js')?>"></script>
<?php include_once '../../includes/footer.php'; ?>

