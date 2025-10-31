<?php 
  include_once __DIR__ . '/../includes/config/_init.php';  
  $PageTitle = "Reports | NIXAR POS";
  $CssPath = "assets/css/styles.css";
  $JSPath = "assets/js/reports.js";

  include_once '../includes/head.php'; 
  SessionManager::checkSession();
?>

<div class="container-fluid p-0 m-0 h-100 px-4 py-3  d-flex flex-column overflow-x-hidden">
    <?php include_once '../includes/components/nav.php'; ?>
        <div class="report-header d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4">
                <select id="reportType" class="text-input me-3" style="width: 200px;">
            <option value="sales">Sales Report</option>
            <option value="inventory">Inventory Report</option>
        </select>
                <div class="d-flex align-items-center gap-2">
                    <input type="date" id="startDate" class="text-input" style="width: 150px;">
                    <span>to</span>
                    <input type="date" id="endDate" class="text-input" style="width: 150px;">
                    <button class="btn ms-2">Generate Report</button>
                </div>
    </div>

    <!-- Sales Report -->
    <div id="salesReport" class="report-section" style="margin-top: 30px;">
        <h2 class="section-title">Metrics</h2>
        <div class="metrics-container" style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 10px;">
            <div class="metric-card filter-tile" style="flex: 1; min-width: 220px; text-align: center; padding: 20px;">
                <div class="class-image">
                    <img src="assets/img/uploads/default-product.png" alt="Total Revenue" style="width:60px;height:60px;object-fit:cover;">
                </div>
                <p class="text-muted" style="margin-top:10px;">Total Revenue</p>
                <h2 id="totalRevenue" >no data</h2>
            </div>

            <div class="metric-card filter-tile" style="flex: 1; min-width: 220px; text-align: center; padding: 20px;">
                <div class="class-image">
                    <img src="assets/img/uploads/default-product.png" alt="Number of Transactions" style="width:60px;height:60px;object-fit:cover;">
                </div>
                <p class="text-muted" style="margin-top:10px;">Number of Transactions</p>
                <h2 id="numOfTransactions" >no data</h2>
            </div>

            <div class="metric-card filter-tile" style="flex: 1; min-width: 220px; text-align: center; padding: 20px;">
                <div class="class-image">
                    <img src="assets/img/uploads/default-product.png" alt="Average Transaction" style="width:60px;height:60px;object-fit:cover;">
                </div>
                <p class="text-muted" style="margin-top:10px;">Average Transaction Value</p>
                <h2 id="avgTransactionValue" >no data</h2>
            </div>

            <div class="metric-card filter-tile" style="flex: 1; min-width: 220px; text-align: center; padding: 20px;">
                <div class="class-image">
                    <img src="assets/img/uploads/default-product.png" alt="Profit Performance" style="width:60px;height:60px;object-fit:cover;">
                </div>
                <p class="text-muted" style="margin-top:10px;">Profit Performance (vs. last month)</p>
                <h2 id="profitPerformance" >no data</h2>
            </div>
        </div>

        <h2 class="section-title" style="margin-top: 40px;">List Metrics</h2>
        <div class="list-metrics" style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 10px;">
            <div class="filter-tile" style="flex: 1; min-width: 300px; padding: 20px;">
                <h4>Category Performance (desc) <i class="fa fa-arrows-alt-v" style="font-size: 15px;"></i></h4> 
                <table style="width:100%; margin-top:10px;">
                    <tr><td>1. Windshield Wash</td><td>300</td></tr>
                    <tr><td>2. Viper Wiper</td><td>250</td></tr>
                    <tr><td>3. Car Rear Extender</td><td>200</td></tr>
                    <tr><td>4. Lorem Ipsum</td><td>150</td></tr>
                    <tr><td>5. Windshield</td><td>100</td></tr>
                </table>
            </div>

            <div class="filter-tile" style="flex: 1; min-width: 300px; padding: 20px;">
                <h4>Sales by Time of Day (desc) <i class="fa fa-arrows-alt-v" style="font-size: 15px;"></i></h4>
                <table style="width:100%; margin-top:10px;">
                    <tr><td>1. 9-10AM</td><td>300</td></tr>
                    <tr><td>2. 10-11AM</td><td>250</td></tr>
                    <tr><td>3. 2-3PM</td><td>200</td></tr>
                    <tr><td>4. 5-6PM</td><td>150</td></tr>
                    <tr><td>5. 1-2PM</td><td>100</td></tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Inventory Report -->
    <div id="inventoryReport" class="report-section" style="display:none; margin-top: 30px;">
        <h2 class="section-title">Metrics</h2>
        <div class="metrics-container" style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 10px;">
            <div class="metric-card filter-tile" style="flex: 1; min-width: 220px; text-align: center; padding: 20px;">
                <div class="class-image">
                    <img src="assets/img/uploads/default-product.png" alt="Most Sold Item" style="width:60px;height:60px;object-fit:cover;">
                </div>
                <p class="text-muted" style="margin-top:10px;">Most Sold Item</p>
                <h2>Windshield Glass</h2>
            </div>

            <div class="metric-card filter-tile" style="flex: 1; min-width: 220px; text-align: center; padding: 20px;">
                <div class="class-image">
                    <img src="assets/img/uploads/default-product.png" alt="Best-selling Item" style="width:60px;height:60px;object-fit:cover;">
                </div>
                <p class="text-muted" style="margin-top:10px;">Best-selling Item (by revenue)</p>
                <h2>Wiper</h2>
            </div>

            <div class="metric-card filter-tile" style="flex: 1; min-width: 220px; text-align: center; padding: 20px;">
                <div class="class-image">
                    <img src="assets/img/uploads/default-product.png" alt="Best-selling Category" style="width:60px;height:60px;object-fit:cover;">
                </div>
                <p class="text-muted" style="margin-top:10px;">Best-selling Category</p>
                <h2>Glass</h2>
            </div>

            <div class="metric-card filter-tile" style="flex: 1; min-width: 220px; text-align: center; padding: 20px;">
                <div class="class-image">
                    <img src="assets/img/uploads/default-product.png" alt="Low Stock Items" style="width:60px;height:60px;object-fit:cover;">
                </div>
                <p class="text-muted" style="margin-top:10px;">Low Stock Items</p>
                <h2>9</h2>
            </div>
        </div>

        <h2 class="section-title" style="margin-top: 40px;">List Metrics</h2>
        <div class="list-metrics" style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 10px;">
            <div class="filter-tile" style="flex: 1; min-width: 300px; padding: 20px;">
                <h4>Most Sold Items (by quantity) <i class="fa fa-arrows-alt-v" style="font-size: 15px;"></i></h4>
                <table style="width:100%; margin-top:10px;">
                    <tr><td>1. Windshield Wash</td><td>300</td></tr>
                    <tr><td>2. Viper Wiper</td><td>250</td></tr>
                    <tr><td>3. Car Rear Extender</td><td>200</td></tr>
                    <tr><td>4. Lorem Ipsum</td><td>150</td></tr>
                    <tr><td>5. Windshield</td><td>100</td></tr>
                </table>
            </div>

            <div class="filter-tile" style="flex: 1; min-width: 300px; padding: 20px;">
                <h4>Best Selling (by revenue) <i class="fa fa-arrows-alt-v" style="font-size: 15px;"></i></h4>
                <table style="width:100%; margin-top:10px;">
                    <tr><td>1. Windshield Wash</td><td>300</td></tr>
                    <tr><td>2. Viper Wiper</td><td>250</td></tr>
                    <tr><td>3. Car Rear Extender</td><td>200</td></tr>
                    <tr><td>4. Lorem Ipsum</td><td>150</td></tr>
                    <tr><td>5. Windshield</td><td>100</td></tr>
                </table>
            </div>

            <div class="filter-tile" style="flex: 1; min-width: 300px; padding: 20px;">
                <h4>Low in Stock</h4>
                <table style="width:100%; margin-top:10px;">
                    <tr><td>1. Windshield Wash</td><td>300</td></tr>
                    <tr><td>2. Viper Wiper</td><td>250</td></tr>
                    <tr><td>3. Car Rear Extender</td><td>200</td></tr>
                    <tr><td>4. Lorem Ipsum</td><td>150</td></tr>
                    <tr><td>5. Windshield</td><td>100</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once("../includes/footer.php"); ?>
