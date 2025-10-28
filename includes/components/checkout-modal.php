<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header w-100 d-flex justify-content-between align-items-center py-2 px-3">
                <h1 class="modal-title fs-4">Create Invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body w-100">
                <div class="row">
                    <div class="col-5 d-flex flex-column justify-content-start align-items-start gap-1">
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
                        <div class="w-100 mt-4">
                            <h6 class="fw-semibold">Payment Method</h6>
                            <select class="form-select mt-2">
                                <option>G-Cash</option>
                                <option>Cash</option>
                                <option>Card</option>
                            </select>
                        </div>
                        <button class="generate-btn btn w-100">Confirm</button>
                    </div>
                    <div class="col-7 color-placeholder-gray rounded-3 d-flex justify-content-center align-items-center">
                        <div class="bg-white w-50 rounded-3 p-2">
                            <div class="w-100 text-center mb-3">
                                <h6>Nixar Auto Glass & Car Tint</h6>
                                <p class="text-muted">26 Lizares St, Bacolod, 6100 Negros Occidental</p>
                                <p class="text-muted">(032) 432 3761</p>
                            </div>
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
