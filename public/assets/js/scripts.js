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
