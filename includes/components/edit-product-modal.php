<?php
?>
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="editProductModalLabel">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="editProductForm">
                    <!-- Hidden Product ID -->
                    <input type="hidden" id="productId" name="productId">

                    <!-- Product Image with Preview -->
                    <div class="mb-3">
                        <label for="editProductImage" class="form-label">Product Image</label>
                        <input class="form-control" type="file" id="editProductImage" accept="image/*">
                        <div class="mt-3 text-center d-flex justify-content-center">
                            <img id="editImagePreview" src="#" alt="Current Product Image" style="display:none; max-width:200px; max-height:200px; border-radius:8px; object-fit:cover;">
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="mb-3">
                        <label for="editProductName" class="form-label">Product Name</label>
                        <input type="text" class="text-input" id="editProductName" placeholder="Enter product name">
                    </div>

                    <div class="mb-3 d-flex gap-3">
                        <div class="w-50">
                            <label for="editCarModel" class="form-label">Compatible Car Model</label>
                            <input type="text" class="text-input" id="editCarModel" placeholder="Enter car model">
                        </div>
                        <div class="w-50">
                            <label for="editYear" class="form-label">Year</label>
                            <input type="number" class="text-input" id="editYear" min="1900" max="2050" placeholder="Enter year">
                        </div>
                    </div>

                    <div class="mb-3 d-flex gap-3">
                        <div class="w-50">
                            <label for="editProductMaterial" class="form-label">Material</label>
                            <select class="form-select" id="editProductMaterial">
                                <?php foreach($ProductMaterials as $Id => $Material): ?>
                                    <option value="<?= $Id ?>"><?= $Material ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="w-50">
                            <label for="editCarTypes" class="form-label">Car Type</label>
                            <select class="form-select" id="editCarTypes">
                                <?php foreach($CarTypes as $Type): ?>
                                    <option value="<?= $Type ?>"><?= $Type ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <div class="custom-modal-w">
                            <label for="editProductCategory" class="form-label">Category</label>
                            <select class="form-select" id="editProductCategory">
                                <?php foreach($ProductCategories as $Id => $Category): ?>
                                    <option value="<?= $Id ?>"><?= $Category ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="custom-modal-w">
                            <label for="editStocks" class="form-label">Stocks</label>
                            <input type="number" class="text-input" id="editStocks" min="1" placeholder="Enter # of stocks">
                        </div>
                        <div class="custom-modal-w">
                            <label for="editPrice" class="form-label">Price</label>
                            <div class="d-flex gap-2 align-items-center">
                                <span>₱</span>
                                <input type="number" class="text-input" id="editPrice" min="1" placeholder="Enter price">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="editProductForm">Update Product</button>
            </div>
        </div>
    </div>
</div>