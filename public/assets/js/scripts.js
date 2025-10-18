const searchBox = document.getElementById('search-input');
const inventoryTbl = document.getElementById('container-inventory-data');
let searchTimeout;

const toggleMenu = () => {
    const menu = document.querySelector('.mobile-nav-links');
    menu.classList.toggle('d-flex');
    menu.classList.toggle('d-none');
}

// nav selected
document.addEventListener('DOMContentLoaded', function() {
  const currentPath = window.location.pathname;
  const navLinks = document.querySelectorAll('.nav-link');

  navLinks.forEach(link => {
    const anchor = link.querySelector('a');
    if (!anchor) return;

    const href = anchor.getAttribute('href');
    const PAGES = ['inventory', 'transaction', 'reports'];

    const isIncluded = PAGES.find(keyword => 
        currentPath.includes(keyword) && href.includes(keyword)
    );

    if (isIncluded) {
      link.classList.add('nav-selected');
    }
  });
});


//for reports
const salesBtn = document.getElementById("salesBtn");
const inventoryBtn = document.getElementById("inventoryBtn");
const financialBtn = document.getElementById("financialBtn");
const reportArea = document.getElementById("reportArea");

function clearActive() {
    [salesBtn, inventoryBtn, financialBtn].forEach(btn => btn.classList.remove("active"));
}

salesBtn.onclick = () => {
    clearActive();
    salesBtn.classList.add("active");
    reportArea.innerHTML = "<p>No sales recorded for the selected period.</p>";
}

inventoryBtn.onclick = () => {
    clearActive();
    inventoryBtn.classList.add("active");
    reportArea.innerHTML = `<p>Reloading Inventory Report...</p>`;
    setTimeout(() => location.reload(), 400);
}

financialBtn.onclick = () => {
    clearActive();
    financialBtn.classList.add("active");
    reportArea.innerHTML = "<p>No finances recorded for the selected period</p>";
}


searchBox.addEventListener('input', () => {
    clearTimeout(searchTimeout)
    searchTimeout = setTimeout(searchProducts, 500);
})

const searchProducts = () => {
    const query = searchBox.value.trim();
    if (query === "") {
        inventoryTbl.innerHTML = "";
        return;
    }

    fetch(`../handlers/search_products.php?q=${ encodeURIComponent(query) }`)
        .then(res => res.json())
        .then(data => {
            if(data.length == 0) {
                inventoryTbl.innerHTML = `
                    <tr><td colspan="7" style="text-align:center;">No data found.</td></tr>
                `;
                return;
            }
            renderRows(data);
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