<?php
  include_once __DIR__ . '/../handlers/check_session.php';

  $PageTitle = "Admin - Inventory | NIXAR POS";
  $CssPath = "../assets/css/styles.css";
  $JSPath = "../assets/js/scripts.js";
  $CarTypes = [
      'Sedan',
      'Hatchback',
      'SUV',
      'Pick-up Truck',
      'Coupe',
      'Convertible',
      'Van',
      'Minivan',
      'Wagon',
      'Jeep',
      'Truck',
      'Electric Vehicle'
  ];
  
  include_once '../../includes/head.php';
  
  checkSession();

  $Conn = DatabaseConnection::getInstance()->getConnection();
  $Inventory = new Inventory($Conn);

  // Setup Pagination
  $Limit = 10;
  $Page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  $Offset = ($Page - 1) * $Limit;

  $TotalInventoryRecords = $Inventory->getInventoryCount();
  $TotalPages = ceil($TotalInventoryRecords / $Limit);
  $InventoryData = $Inventory->fetchInventory($Limit, $Offset);
?>
  <div class="container-fluid p-0 m-0 h-100 px-4 pt-1 d-flex flex-column">
    <?php include_once '../../includes/components/nav.php'; ?>
    
    <div class="row container-fluid p-0 m-0 mt-3 flex-fill mb-3 gap-3">
      <!-- Left Sidebar - Filters -->
      <div class="col-md-2 bg-white p-4 border border-3 shadow-sm rounded-3">
        <h4 class="fw-bold mb-4">Filter Search</h4>
        
        <!-- Product Category -->
        <div class="mb-4">
          <h6 class="fw-semibold mb-3">Product Category</h6>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="laminatedGlass">
            <label class="form-check-label" for="laminatedGlass">Laminated Glass</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="temperedGlass">
            <label class="form-check-label" for="temperedGlass">Tempered Glass</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="tints">
            <label class="form-check-label" for="tints">Tints</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="plasticComposite">
            <label class="form-check-label" for="plasticComposite">Plastic/Acrylic Composite</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="rubberMetalComposite">
            <label class="form-check-label" for="rubberMetalComposite">Rubber and Metal Composite</label>
          </div>
        </div>
        
        <!-- Car Model -->
        <div class="mb-4">
          <label for="carModel" class="fw-semibold mb-3">Car Model</label>
          <input type="text" placeholder="e.g., Fortuner, Toyota, ..." class="text-input" id="carModel">
        </div>
        
        <!-- Car Type -->
        <div class="mb-4">
          <label for="carType" class="fw-semibold mb-3">Car Type</label>
          <select id="carType" class="form-select">
            <option selected disabled>Select Car Type</option>
            <?php foreach($CarTypes as $Type): ?>
              <option value="<?= $Type ?>">
                <?= $Type; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        
        <!-- Stock Availability -->
        <div class="mb-4">
          <h6 class="fw-semibold mb-3">Stock Availability</h6>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="stock">
            <label class="form-check-label" for="stock">Stock</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="outOfStock">
            <label class="form-check-label" for="outOfStock">Out of Stock</label>
          </div>
        </div>
        
        <!-- Price Range -->
        <div class="d-flex justify-content-between align-items-center mb-2">
          <label for="priceRange" class="fw-semibold">Price Range</label>
          <div class="d-flex align-items-center gap-2">
            <span>₱</span>
            <input
              type="number"
              id="priceValue"
              class="text-input"
              min="0"
              max="10000"
              step="100"
              value="0"
              oninput="document.getElementById('priceRange').value = this.value"
            >
          </div>
        </div>
        
        <input
          type="range"
          class="form-range"
          id="priceRange"
          min="0"
          max="25000"
          step="100"
          value="0"
          oninput="document.getElementById('priceValue').value = this.value"
        />
        
        <button class="btn w-100">Apply Filter</button>
      </div>
      
      <!-- Right Content - Inventory Table -->
      <div class="col bg-light p-4 rounded-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="fw-bold">Inventory</h2>
          <?php if(SessionManager::get('role') === 'admin'): ?>
            <button class="btn">Add Product</button>
          <?php endif; ?>
        </div>
        
        <div class="d-flex gap-2 mb-4">
          <input type="text" class="text-input" placeholder="Search by car model, type, or product...">
          <button class="btn">Search</button>
        </div>
        
<!--=================  Placeholder for Inventory Table  =================-->
        <div class="table-responsive" id="container-inventory-tbl">
          <table class="table table-striped bg-white">
            <thead class="color-primary-red">
            <tr>
              <th>Product Name</th>
              <th>Car Model</th>
              <th>Year</th>
              <th>Car Type</th>
              <th>Category</th>
              <th>Stocks</th>
              <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($InventoryData as $Data): ?>
              <tr>
                <td><?= $Data['product_name'] ?></td>
                <td><?= $Data['make'] . ' ' . $Data['model']?></td>
                <td><?= $Data['year'] ?></td>
                <td><?= $Data['type'] ?></td>
                <td><?= $Data['category'] ?></td>
                <td><?= $Data['current_stock'] ?></td>
                <td>₱<?= $Data['final_price'] ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        
        <!-- Pagination -->
        <?php 
          // Determine the range of page numbers to display in pagination.
          $MaxVisiblePageIcons = 3;
          $StartPage = max(1, $Page - 1);
          $EndPage = min($TotalPages, $StartPage + $MaxVisiblePageIcons - 1);
        
          // Adjust start page if near the last pages so that we always display up to `$MaxVisiblePageIcons`
          $NearMaxPage = $EndPage - $StartPage + 1;
          if($NearMaxPage < $MaxVisiblePageIcons) {
            $StartPage = max(1, $EndPage - $MaxVisiblePageIcons + 1);
          }
        ?>
        <nav>
          <ul class="pagination justify-content-center">
            <!-- Show Previous button only when the current page is not the first page -->
            <?php if($Page > 1): ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?= $Page - 1 ?>">← Previous</a>
              </li>
            <?php endif; ?>
            <!-- Show the first 3 pages -->
            <?php for($i = 1; $i <= min($MaxVisiblePageIcons, $TotalPages); $i++): ?>
              <li class="page-item <?= ($Page === $i) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
              </li>
            <?php endfor; ?>
            <!-- Show ellipsis if current page is within `MaxVisiblePageIcons`, else display the page number -->
            <?php if($TotalPages > $MaxVisiblePageIcons): ?>
              <li class="page-item <?= ($Page > $MaxVisiblePageIcons) ? 'active' : '' ?>">
                <a class="page-link" href="#"><?= ($Page > $MaxVisiblePageIcons) ? $Page : '...'; ?></a>
              </li>
            <?php endif; ?>
            <!-- Show Next button when not on the last page  -->
            <?php if($Page < $TotalPages): ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?= $Page + 1 ?>">Next →</a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
<?php include_once '../../includes/footer.php'; ?>