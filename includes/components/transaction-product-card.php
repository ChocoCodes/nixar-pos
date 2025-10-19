<div class="col-12 col-xl-6 col-xxl-4">
    <div class="w-100 h-100 border rounded-3 shadow-sm p-2 d-flex flex-column justify-content-between">
        <div class="w-100 d-flex align-items-start justify-content-between">
            <div class="w-50 ratio ratio-4x3">
                <img
                        src="<?= $dummyProduct['pic']; ?>"
                        alt="product imagea"
                        class="img-fluid w-100 rounded bg-secondary object-fit-cover"
                />
            </div>
            <div class="w-50 px-3 py-2">
                <h3 class="text-left"><?= $dummyProduct['name']; ?></h3>
                <p class="fs-5"><?= $dummyProduct['category']; ?></p>
            </div>
        </div>
        <div class="w-100 d-flex align-items-center justify-content-between py-2">
            <h3>₱ <?= $dummyProduct['price']; ?></h3>
            <div class="position-relative d-flex align-items-center">
                <button class="transaction-btn remove-btn position-absolute start-0">
                    <i class="fa-solid fa-minus"></i>
                </button>
                <div class="quantity-display px-4 py-1 rounded-pill">
                    s
                </div>
                <button class="transaction-btn add-btn position-absolute end-0">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>
