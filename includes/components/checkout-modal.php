<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header w-100 d-flex justify-content-between align-items-center py-2 px-3">
                <h1 class="modal-title fs-4">Create Invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body w-100">
                <div class="row">
                    <div class="col-12 col-lg-5 d-flex flex-column justify-content-start align-items-start gap-1">
                        <!-- Order Details -->
                        <h6>Order Details</h6>
                        <table class="table table-bordered rounded-4 table-fixed">
                            <thead>
                            <tr>
                                <th class="fw-normal text-muted" style="width: 40%;">Item</th>
                                <th class="text-center fw-normal text-muted" style="width: 20%;">Qty</th>
                                <th class="text-center fw-normal text-muted" style="width: 20%;">Unit Price</th>
                                <th class="text-end fw-normal text-muted" style="width: 20%;">Total</th>
                            </tr>
                            </thead>
                            <tbody id="checkout-table-body">
                            <!-- Populated dynamically via JS -->
                            </tbody>
                        </table>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-muted">Subtotal</p>
                            <p class="subtotal-display">₱0</p>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-danger">Discount</p>
                            <input type="number" class="text-end text-input discount-input" style="width: 30%;"/>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="fw-medium">Total</p>
                            <p class="total-display">₱0</p>
                        </div>

                        <!-- Customer Details -->
                        <h6 class="mt-4">Customer Details</h6>
                        <div class="w-100 d-flex flex-column gap-2">
                            <div class="d-flex gap-2">
                                <div class="w-50">
                                    <label for="customer-name" class="form-label text-muted small mb-0">Full Name</label>
                                    <input
                                        type="text"
                                        id="customer-name"
                                        class="text-input w-100"
                                        placeholder="Enter customer name"
                                    />
                                </div>
                                <div class="w-50">
                                    <label for="customer-email" class="form-label text-muted small mb-0">Email Address</label>
                                    <input
                                        type="email"
                                        id="customer-email"
                                        class="text-input w-100"
                                        placeholder="customer@example.com"
                                    />
                                </div>
                            </div>
                            <div>
                                <label for="customer-address" class="fw-semibold form-label text-muted small">Address</label>
                                <input
                                    type="text"
                                    id="customer-address"
                                    class="text-input w-100"
                                    placeholder="Street, City, Province"
                                />
                            </div>
                            <div class="d-flex gap-2">
                                <div class="w-50">
                                    <label for="customer-phone" class="fw-semibold form-label text-muted small mb-0">Phone Number</label>
                                    <input
                                        type="tel"
                                        id="customer-phone"
                                        class="text-input w-100"
                                        placeholder="09XX XXX XXXX"
                                    />
                                </div>
                                <div class="w-50">
                                    <label for="payment-method" class="fw-semibold form-label text-muted small mb-0">Payment Method</label>
                                    <select id="payment-method" class="text-input form-select">
                                        <option>G-Cash</option>
                                        <option>Cash</option>
                                        <option>Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Car Details -->
                        <h6 class="mt-4">Car Details</h6>
                        <div class="w-100 d-flex flex-column gap-2 mb-4">
                            <div class="d-flex gap-2">
                                <div class="w-50">
                                    <label for="cust-car-make" class="form-label text-muted small mb-0">Make</label>
                                    <input
                                        type="text"
                                        id="cust-car-make"
                                        class="text-input w-100"
                                        placeholder="Enter customer name"
                                    />
                                </div>
                                <div class="w-50">
                                    <label for="cust-car-model" class="form-label text-muted small mb-0">Model</label>
                                    <input
                                        type="email"
                                        id="cust-car-model"
                                        class="text-input w-100"
                                        placeholder="customer@example.com"
                                    />
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="w-50">
                                    <label for="cust-car-year" class="form-label text-muted small mb-0">Year</label>
                                    <input
                                        type="email"
                                        id="customer-email"
                                        class="text-input w-100"
                                        placeholder="customer@example.com"
                                    />
                                </div>
                                <div class="w-50">
                                    <label for="cust-car-type" class="fw-semibold form-label text-muted small mb-0">Type</label>
                                    <select id="cust-car-type" class="text-input form-select">
                                        <option selected value="default" disabled>Select Car Type</option>
                                        <?php foreach($CarTypes as $Type): ?>
                                            <option value="<?= $Type ?>">
                                                <?= $Type; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="generate-btn btn w-100">Confirm</button>
                    </div>
                    <div class="d-none col-7 color-placeholder-gray rounded-3 d-lg-flex justify-content-center align-items-center">
                        <div class="bg-white w-75 rounded-3 p-2">
                            <div class="w-100 text-center mb-3 d-flex flex-column gap-1">
                                <h6 class="fs-4">Nixar Auto Glass & Car Tint</h6>
                                <div>
                                    <p class="text-muted fs-6">26 Lizares St, Bacolod, 6100 Negros Occidental</p>
                                    <p class="text-muted"><span class="fw-semibold">TIN: </span>431-132-312-312</p>
                                    <p class="text-muted"><span class="fw-semibold">Tel. No: </span>(032) 432 3761</p>
                                    <p class="text-muted">ByteMe! Point-of Sales | Bacolod City</p>
                                </div>
                            </div>      
                            <div class="w-100 d-flex justify-content-between align-items-center"></div>                      
                            <!-- ========== RECEIPT DETAILS CONTAINER ============ -->    
                            <div id="receipt" class="mb-3"></div>
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <p class="fw-semibold">Sub Total</p>
                                <p class="receipt-subtotal"></p>
                            </div>
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <p class="fw-semibold">Discount</p>
                                <p class="receipt-discount">₱0</p>
                            </div>
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <p class="fw-semibold">Total</p>
                                <p class="receipt-total"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
