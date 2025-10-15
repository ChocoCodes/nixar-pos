<nav class="navbar w-100 d-flex justify-content-between align-items-center rounded-4 px-4">
    <img
            src="../assets/svg/nixar-logo-white.svg"
            alt="nixar-logo-white"
            width="150px"
    />

    <!--desktop menu-->
    <ul class="nav-links d-none d-md-flex gap-2 list-unstyled justify-content-evenly align-items-center m-0 p-1 rounded-pill">
        <li class="nav-link py-2 px-4 rounded-pill">Inventory</li>
        <li class="nav-link py-2 px-4 rounded-pill">Transaction</li>
        <li class="nav-link py-2 px-4 rounded-pill">Reports</li>
    </ul>
    <button class="logout-btn d-none d-md-block">
        Log Out
    </button>

    <!--mobile menu-->
    <i
            class="menu-icon fa-solid fa-bars d-flex justify-content-center align-items-center d-md-none text-white rounded-2"
            onclick="toggleMenu()"
    ></i>
    <div class="mobile-menu w-100 d-block d-md-none">
        <div class="mobile-nav-links w-100 d-none justify-content-center align-items-center bg-white rounded-3 mt-2">
            <ul class="w-100 d-flex flex-column align-items-center justify-content-evenly m-0 list-unstyled p-1">
                <li class="mobile-nav-link">Inventory</li>
                <li class="mobile-nav-link">Transactions</li>
                <li class="mobile-nav-link">Reports</li>
                <li class="mobile-nav-link">Log Out</li>
            </ul>
        </div>
    </div>
</nav>

