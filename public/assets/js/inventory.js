const searchBox = document.getElementById('search-input');
const inventoryTbl = document.getElementById('container-inventory-data');
const pagination = document.getElementById('pagination-container');

let searchTimeout;
let queryString = '';
const LIMIT = 10;
let currentPage = 1;

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

    fetch(`../handlers/search_products.php?q=${ encodeURIComponent(query) }&limit=${ LIMIT }&page=${ page }`)
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
            <td>${ product.make } ${ product.model }</td>
            <td>${ product.year }</td>
            <td>${ product.type }</td>
            <td>${ product.category }</td>
            <td>${ product.current_stock }</td>
            <td>₱${ product.final_price }</td>
        </tr>
    `).join('\n');
    inventoryTbl.innerHTML = htmlString;
}
/* ================= INVENTORY PAGINATION FUNCTIONS ================= */
const fetchInventory = async (page = 1) => {
    try {
        const response = await fetch(`../handlers/fetch_inventory.php?limit=${ LIMIT }&page=${ page }`)
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


document.addEventListener('DOMContentLoaded', () => {
    fetchInventory();
});