<?php
?>
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4" id="addProductModalLabel">Add Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      
      <div class="modal-body">
        <form action="" enctype="multipart/form-data" id="addProductForm">
          <!-- Product Image with Preview -->
          <div class="mb-3">
            <label for="productImage" class="form-label">Product Image</label>
            <input class="form-control" type="file" id="productImage" accept="image/*">
            <div class="mt-3 text-center d-flex justify-content-center">
              <img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width:200px; max-height:200px; border-radius:8px; object-fit:cover;">
            </div>
          </div>
          
          <!-- Product Details -->
          <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="text-input" id="productName" placeholder="Enter product name">
          </div>
          
          <div class="mb-3 d-flex gap-3">
            <div class="w-50">
              <label for="carModel" class="form-label">Compatible Car Model</label>
              <input type="text" class="text-input" id="carModel" placeholder="Enter car model">
            </div>
            <div class="w-50">
              <label for="year" class="form-label">Year</label>
              <input type="number" class="text-input" id="year" min="1900" max="2050" placeholder="Enter year">
            </div>
          </div>
          
          <div class="mb-3 d-flex gap-3">
            <div class="w-50">
              <label for="productMaterial" class="form-label">Material</label>
              <select class="form-select" id="productMaterial">
                <?php foreach($ProductMaterials as $Id => $Material): ?>
                  <option value="<?= $Id ?>"><?= $Material ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="w-50">
              <label for="carTypes" class="form-label">Car Type</label>
              <select class="form-select" id="carTypes">
                <?php foreach($CarTypes as $Type): ?>
                  <option value="<?= $Type ?>"><?= $Type ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          
          <div class="mb-3 d-flex justify-content-between">
            <div class="custom-modal-w">
              <label for="productCategory" class="form-label">Category</label>
              <select class="form-select" id="productCategory">
                <?php foreach($ProductCategories as $Id => $Category): ?>
                  <option value="<?= $Id ?>"><?= $Category ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="custom-modal-w">
              <label for="stocks" class="form-label">Stocks</label>
              <input type="number" class="text-input" id="stocks" min="1" placeholder="Enter # of stocks">
            </div>
            <div class="custom-modal-w">
              <label for="price" class="form-label">Price</label>
              <div class="d-flex gap-2 align-items-center">
                <span>₱</span>
                <input type="number" class="text-input" id="price" min="1" placeholder="Enter price">
              </div>
            </div>
          </div>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="submit" class="btn" form="addProductForm">Add Product</button>
      </div>
    </div>
  </div>
</div>
