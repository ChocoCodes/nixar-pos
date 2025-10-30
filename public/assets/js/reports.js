//for switching from inventory to sales(in dropdown)/vice versa
document.getElementById('reportType').addEventListener('change', function() {
    const sales = document.getElementById('salesReport');
    const inventory = document.getElementById('inventoryReport');
    if (this.value === 'sales') {
        sales.style.display = 'block';
        inventory.style.display = 'none';
    } else {
        sales.style.display = 'none';
        inventory.style.display = 'block';
    }
});
