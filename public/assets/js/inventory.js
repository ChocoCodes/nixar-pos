const searchBox = document.getElementById('search-input');
const inventoryTbl = document.getElementById('container-inventory-data');
const pagination = document.getElementById('pagination-container');

let searchTimeout;
let queryString = '';
const LIMIT = 10;
let currentPage = 1;

// Edit Modal Utils
const categoryMap = {
  'Glass': '0',
  'Accessories': '1',
  'Tints': '2',
  'Mirrors': '3'
};

/* ================= INVENTORY SEARCH FUNCTIONS ================= */
searchBox.addEventListener('input', () => {
    clearTimeout(searchTimeout)
    searchTimeout = setTimeout(searchProducts, 500);
})

const searchProducts = (page = 1) => {
    const query = searchBox.value.trim();
    if (query === "") {
        inventoryTbl.innerHTML = "";
        pagination.innerHTML = "";
        fetchInventory();
        return;
    }

    queryString = query;
    currentPage = page;

    fetch(`handlers/search_products.php?q=${ encodeURIComponent(query) }&limit=${ LIMIT }&page=${ page }`)
        .then(res => res.json())
        .then(data => {
            const rows = data.inventory;
            if(!rows || rows.length == 0) {
                inventoryTbl.innerHTML = `
                    <tr><td colspan="7" style="text-align:center;">No data found.</td></tr>
                `;
                pagination.innerHTML = '';
                return;
            }
            renderRows(rows);
            updatePagination(data.totalPages, data.currentPage);
        })
        .catch(err => {
            console.error(err);
            inventoryTbl.innerHTML = `
                <tr><td colspan="7" style="text-align:center;">${ err.message }</td></tr>
            `;
        }); 
}

const renderRows = (data) => {
    const htmlString = data.map(product =>     
    `
        <tr>
            <td>${ product.product_name }</td>
            <td>${ product.car_make_model }</td>
            <td>${ product.year }</td>
            <td>${ product.type }</td>
            <td>${ product.category }</td>
            <td>${ product.current_stock }</td>
            <td>₱${ product.final_price }</td>
            <td>
              <button 
                type="button" 
                class="btn btn-edit" 
                data-bs-toggle="modal" 
                data-bs-target="#editProductModal"
                data-id="${ product.id }"
                data-name="${ product.product_name }"
                data-model="${ product.model }"
                data-year="${ product.year }"
                data-material="${ product.material }"
                data-type="${ product.type }"
                data-category="${ product.category }"
                data-stock="${ product.current_stock }"
                data-price="${ product.final_price }"
                data-image="${ product.image_path }"
              >
                <i class="fa-regular fa-pen-to-square"></i>
              </button>
              <button 
                type="button" 
                class="btn btn-delete"
                data-bs-toggle="modal" 
                data-bs-target="#deleteProductModal"
                data-id="${ product.id }"
                data-name="${ product.product_name }"
              >
                <i class="fa-solid fa-trash"></i>
              </button>

           </td>
        </tr>
    `).join('\n');
    inventoryTbl.innerHTML = htmlString;

    // Attach click listeners for edit buttons
    const editButtons = document.querySelectorAll('.btn-edit');
    editButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        fillEditModal(btn.dataset);
      });
    });

    // Attach click listeners for delete buttons
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        fillDeleteModal(btn.dataset);
      });
    });

}

// Fill edit modal with product data
const fillEditModal = (data) => {
  // Fill text fields
  document.getElementById('productId').value = data.id;
  document.getElementById('editProductName').value = data.name;
  document.getElementById('editCarModel').value = data.model;
  document.getElementById('editYear').value = data.year;
  document.getElementById('editStocks').value = data.stock;
  document.getElementById('editPrice').value = data.price;

  // Select dropdown values
  document.getElementById('editProductMaterial').value = data.material;
  console.log(data.material);
  document.getElementById('editCarTypes').value = data.type;
  console.log(data.type);
  document.getElementById('editProductCategory').value = categoryMap[data.category] || '0';;
  console.log(data.category);

  const preview = document.getElementById('editImagePreview');
  if (data.image) {
    preview.src = `../uploads/${data.image}`; // TODO: Update with actual image path
    preview.style.display = 'block';
  } else {
    preview.src = '#';
    preview.style.display = 'none';
  }
};

const fillDeleteModal = (data) => {
  const productNameSpan = document.getElementById('productToDelete');
  const deleteForm = document.getElementById('deleteProductForm');

  // Show product name in modal
  productNameSpan.textContent = data.name;

  // Store product ID in a hidden input (so it can be submitted)
  let hiddenInput = deleteForm.querySelector('input[name="productId"]');
  if (!hiddenInput) {
    hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'productId';
    deleteForm.appendChild(hiddenInput);
  }
  hiddenInput.value = data.id;
};


/* ================= INVENTORY PAGINATION FUNCTIONS ================= */
const fetchInventory = async (page = 1) => {
    try {
        const response = await fetch(`handlers/fetch_inventory.php?limit=${ LIMIT }&page=${ page }`)
        const data = await response.json();
        
        if(data.length == 0) {
            inventoryTbl.innerHTML = `
                <tr><td colspan="7" style="text-align:center;">No data found.</td></tr>
            `;
            return;
        }

        renderRows(data.inventory);
        updatePagination(data.totalPages, data.currentPage)
    } catch (err) {
        console.error(err.message);
    }
}

const updatePagination = (totalPages, currentPage) => {
    let htmlString = '';
    // Render Previous button if current page is not the first page
    if (currentPage > 1) {
        htmlString += `
        <li class="page-item">
            <a class="page-link" href="#" data-page="${ currentPage - 1 }">
            ← Previous
            </a>
        </li>`;
    }
    
    const MAX_ICONS_VISIBLE = 3;
    let start = Math.max(1, currentPage - 1);
    let end = Math.min(totalPages, start + MAX_ICONS_VISIBLE - 1);
    // Adjust starting value if it is nearing the end page
    if (end - start < MAX_ICONS_VISIBLE - 1) {
        start = Math.max(1, end - MAX_ICONS_VISIBLE + 1);
    }
    // Render all page icons
    for (let i = start; i <= end; i++) {
        htmlString += `
            <li class="page-item ${ i === currentPage ? 'active' : '' }">
                <a class="page-link" href="#" data-page="${ i }">${ i }</a>
            </li>
        `;
    }
    // Render Next button if current page is not the last page
    if (currentPage < totalPages) {
      htmlString += `
        <li class="page-item">
            <a class="page-link" href="#" data-page="${ currentPage + 1 }">
                Next →
            </a>
        </li>`;
    }
    // Embed pagination buttons into pagination controller
    pagination.innerHTML = htmlString;
    const pageLinks = pagination.querySelectorAll('.page-link');

    pageLinks.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            const page = parseInt(e.target.dataset.page);
            if(isNaN(page)) {
                return;
            }

            if(queryString) searchProducts(page);
            else fetchInventory(page);
        })
    })
}

/* ================= FILTER SEARCH FUNCTIONS ================= */
const searchByFilters = async (page = 1) => {
    const productMaterial = document.querySelector('input[name="category"]:checked')?.value || null;
    const carModel = document.getElementById('carModel').value.trim() || null;
    const carType = document.getElementById('carType').value !== "default" ? 
                    document.getElementById('carType').value : null;
    const isInStock = document.querySelector('input[name="stockStatus"]:checked')?.value || null;
    const priceRange = document.getElementById('priceValue').value || null;

    const filterValues = {
        productMaterial, 
        carModel, 
        carType, 
        isInStock, 
        priceRange
    }

    const params = buildFilterParams({ ...filterValues });
    console.log(params)
    
    try {
        const response = await fetch(`handlers/filter_products.php?${ params }&limit=${ LIMIT }&page=${ page }`);
        const filtered = await response.json();
        console.log('Filtered response:', filtered);
        console.log(`SQL: ${ filtered.sql } Params: ${ filtered.params } Types: ${ filtered.types }`);
        if(!filtered.inventory || filtered.inventory.length == 0) {
            inventoryTbl.innerHTML = `
                <tr><td colspan="7" style="text-align:center;">No data found.</td></tr>
            `;
            return;
        }

        renderRows(filtered.inventory);
        updatePagination(filtered.totalPages, filtered.currentPage);
    } catch(err) {
        console.error(err);
        inventoryTbl.innerHTML = `
            <tr><td colspan="7" style="text-align:center;">${ err.message }</td></tr>
        `;
    }
}

const buildFilterParams = ({ productMaterial, carModel, carType, isInStock, priceRange }) => {
    const filter = {};

    if(productMaterial) filter.material = productMaterial;
    if(carModel) filter.model = carModel;
    if(carType) filter.type = carType;
    if(isInStock) filter.stock = isInStock === "inStock" ? 1 : 0;
    if(priceRange) filter.max_range = priceRange;
    
    params = new URLSearchParams(filter).toString();
    return params;
} 

const resetFilters = () => {
  document.querySelectorAll('input[type="radio"]').forEach(radio => radio.checked = false);
  document.getElementById('carModel').value = '';
  document.getElementById('carType').value = 'default';
  document.getElementById('priceValue').value = '';
  searchProducts();
}

document.addEventListener('DOMContentLoaded', () => {
    fetchInventory();
});

// Image preview for product forms
document.getElementById('productImage').addEventListener('change', function(event) {
  const file = event.target.files[0];
  const preview = document.getElementById('imagePreview');

  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    };
    reader.readAsDataURL(file);
  } else {
    preview.src = '#';
    preview.style.display = 'none';
  }
});

