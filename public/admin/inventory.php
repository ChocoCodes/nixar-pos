<?php
  include_once __DIR__ . '/../handlers/check_session.php';
  
  $PageTitle = "Admin - Inventory | NIXAR POS";
  $CssPath = "../assets/css/styles.css";
  $JSPath = "../assets/js/scripts.js";
  
  include_once '../../includes/head.php';
  
  checkSession();
?>
<?php include_once '../../includes/head.php'; ?>
  <div class="container-fluid p-0 m-0 h-100 px-4 pt-4 d-flex flex-column">
    <?php include_once '../../includes/components/nav.php'; ?>
    
    <div class="row container-fluid mt-3 flex-fill mb-3 gap-3">
      <!-- Left Sidebar - Filters -->
      <div class="col-md-2 bg-white p-4 border border-3 shadow-sm rounded-3">
        <h4 class="fw-bold mb-4">Filter Search</h4>
        
        <!-- Product Category -->
        <div class="mb-4">
          <h6 class="fw-semibold mb-3">Product Category</h6>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="glass">
            <label class="form-check-label" for="glass">Glass</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="rubber">
            <label class="form-check-label" for="rubber">Rubber</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="tire">
            <label class="form-check-label" for="tire">Tire</label>
          </div>
        </div>
        
        <!-- Car Model -->
        <div class="mb-4">
          <h6 class="fw-semibold mb-3">Car Model</h6>
          <input type="text" placeholder="e.g., Fortuner, Toyota, ..." class="text-input">
        </div>
        
        <!-- Car Type -->
        <div class="mb-4">
          <h6 class="fw-semibold mb-3">Car Type</h6>
          <select class="form-select">
            <option selected>Select Car Type</option>
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
              max="25000"
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
        <div class="table-responsive">
          <table class="table table-striped bg-white">
            <thead class="color-primary-red">
            <tr>
              <th>Product Name</th>
              <th>Car Model</th>
              <th>Car Type</th>
              <th>Category</th>
              <th>Stocks</th>
              <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Windshield Glass</td>
              <td>Toyota Corolla</td>
              <td>Sedan</td>
              <td>Glass</td>
              <td>3</td>
              <td>₱ 5,000.00</td>
            </tr>
            <tr>
              <td>Rear Window Glass</td>
              <td>Honda Civic</td>
              <td>Sedan</td>
              <td>Glass</td>
              <td>5</td>
              <td>₱ 6,500.00</td>
            </tr>
            <tr>
              <td>Side Window Glass</td>
              <td>Ford Ranger</td>
              <td>Pick-up Truck</td>
              <td>Glass</td>
              <td>1</td>
              <td>₱ 3,500.00</td>
            </tr>
            <tr>
              <td>Door Rubber Seal</td>
              <td>Toyota Hilux</td>
              <td>Pick-up Truck</td>
              <td>Rubber</td>
              <td>1</td>
              <td>₱ 3,500.00</td>
            </tr>
            <tr>
              <td>Magic Tint Film - Windsh...</td>
              <td>Toyota Rush</td>
              <td>SUV</td>
              <td>Tint</td>
              <td>1</td>
              <td>₱ 900.00</td>
            </tr>
            </tbody>
          </table>
        </div>
        
        <!-- Pagination -->
        <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">← Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">Next →</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
<?php include_once '../../includes/footer.php'; ?>