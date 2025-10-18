const searchBox = document.getElementById('search-input');
const inventoryTbl = document.getElementById('container-inventory-data');
let searchTimeout;

const toggleMenu = () => {
    const menu = document.querySelector('.mobile-nav-links');
    menu.classList.toggle('d-flex');
    menu.classList.toggle('d-none');
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