<?php
$date_from = date('Y-m-01');            
$date_to   = date('Y-m-d');            
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nixar Reports</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

  <style>
    :root{
      --brand:#b53a3a;      
      --brand-dark:#8b2b2b; 
      --muted-card:#f8f8f8;
    }
    body {
      font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background: #ffffff;
      color: #111;
      padding: 32px;
    }

    .topbar {
      background: var(--brand);
      border-radius: 16px;
      padding: 20px 28px;
      display:flex;
      align-items:center;
      gap: 24px;
      box-shadow: 0 2px 0 rgba(0,0,0,0.02);
    }
    .topbar .logo {
      display:flex;
      align-items:center;
      gap:12px;
      min-width: 220px;
    }
    .topbar .logo img {
      height:48px;
    }
    .topbar .logo small { color: #f6eaea; display:block; margin-top:-6px; font-size:13px; opacity:.95; }

    .topbar .center-nav {
      margin: 0 auto;
      max-width: 560px;
      width:100%;
      display:flex;
      justify-content:center;
    }
    .nav-pill {
      background: rgba(0,0,0,0.12);
      border-radius: 999px;
      padding: 8px;
      display:flex;
      gap:8px;
      align-items:center;
      box-shadow: inset 0 -6px 0 rgba(0,0,0,0.03);
    }
    .nav-pill .btn {
      border-radius: 999px;
      padding: 10px 28px;
      font-weight:600;
      color: #fff;
      background: transparent;
      border: none;
      opacity: .85;
    }
    .nav-pill .btn.active {
      background: var(--brand-dark);
      box-shadow: 0 4px 0 rgba(0,0,0,0.05);
      opacity:1;
    }

    .generate-btn {
      min-width:160px;
    }

    .page {
      margin-top: 26px;
    }

    .filters {
      display:flex;
      gap:16px;
      align-items:center;
      margin-bottom:18px;
    }

    .report-tabs .nav-link {
      background:#f5f5f5;
      border-radius:8px;
      margin-right:8px;
      color:#111;
      font-weight:600;
    }
    .report-tabs .nav-link.active {
      background:#ffffff;
      box-shadow: 0 1px 0 rgba(0,0,0,0.03);
      border: 1px solid rgba(0,0,0,0.03);
    }

    h1.overview {
      font-size:64px;
      font-weight:800;
      margin-top:8px;
      margin-bottom:22px;
    }

    .stat-card {
      border-radius:12px;
      padding:22px;
      background: #fff;
      box-shadow: 0 6px 20px rgba(0,0,0,0.04);
      margin-bottom:18px;
    }
    .stat-card .label {
      color:#444;
      font-size:16px;
      margin-bottom:6px;
    }
    .stat-card .value {
      font-size:34px;
      font-weight:800;
    }
    .stat-card .sub {
      margin-top:10px;
      font-size:13px;
      color: #6b6b6b;
      display:flex;
      align-items:center;
      gap:8px;
    }
    .stat-card .sub .up { color:#22b573; }
    .stat-card .sub .down { color:#df4b4b; }

    @media (max-width: 768px){
      h1.overview { font-size:40px; }
      .topbar { padding:14px; }
      .topbar .logo img { height:40px; }
      .nav-pill .btn { padding:8px 18px; font-size:14px;}
      body { padding:16px; }
    }
  </style>
</head>
<body>

  <div class="container-fluid">

    <div class="topbar mb-4">
      <div class="logo">
        
        <div>
          <div style="font-weight:800;color:#fff;font-size:22px;letter-spacing:1px;">NIXAR</div>
          <small>Auto Glass &amp; Car Tint</small>
        </div>
      </div>

      <div class="center-nav">
        <div class="nav-pill">
          <button class="btn">Inventory</button>
          <button class="btn">Transaction</button>
          <button class="btn active">Reports</button>
        </div>
      </div>

      
    </div>

    <div class="page">
      <form class="row g-2 align-items-center mb-3">
        <div class="col-auto">
          <div class="input-group">
            <input type="date" class="form-control" name="from" value="<?= htmlspecialchars($date_from) ?>">
          </div>
        </div>
        <div class="col-auto align-self-center">to</div>
        <div class="col-auto">
          <div class="input-group">
            <input type="date" class="form-control" name="to" value="<?= htmlspecialchars($date_to) ?>">
          </div>
        </div>
        <div class="col-auto ms-auto">
          <button type="submit" class="btn btn-danger">Generate Report</button>
        </div>
      </form>

      <ul class="nav report-tabs mb-3">
        <li class="nav-item">
          <a class="nav-link" href="#"> <i class="bi bi-wallet2 me-1"></i> Sales Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#"> <i class="bi bi-bag me-1"></i> Inventory Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> <i class="bi bi-currency-dollar me-1"></i> Financial Report</a>
        </li>
      </ul>

      <h1 class="overview">Overview</h1>

      <div class="row">

        <div class="col-12 col-md-8">
          <div class="stat-card">
            <div class="label">In Stock</div>
            <div class="value">1,234 Items</div>
            <div class="sub">
              <span class="up"><i class="bi bi-arrow-up-right"></i> 12.3 %</span>
              <small class="text-muted">vs last period</small>
            </div>
          </div>

          <div class="stat-card mt-3">
            <div class="label">Out of Stock</div>
            <div class="value">5 Products</div>
            <div class="sub">
              <span class="down"><i class="bi bi-arrow-down-right"></i> 6.3 %</span>
              <small class="text-muted">vs last period</small>
            </div>
          </div>

          <div class="stat-card mt-3">
            <div class="label">Low Stock</div>
            <div class="value">13 Products</div>
            <div class="sub">
              <span class="down"><i class="bi bi-arrow-down-right"></i> 2.4 %</span>
              <small class="text-muted">vs last period</small>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
