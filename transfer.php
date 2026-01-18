<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Raiffeisen | Fund Transfer</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
<style>
  body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: radial-gradient(circle at top left, #0a0a0a, #1f1f1f);
    color: #fff;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }

  :root { --raiffeisen-yellow: #fee600; --raiffeisen-black: #000000; }

  /* Sidebar */
  aside {
    width: 220px;
    background: rgba(0,0,0,0.95);
    color: #fff;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    box-shadow: 4px 0 20px rgba(0,0,0,0.7);
    display: flex;
    flex-direction: column;
    z-index: 100;
  }

  aside .logo {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 80px;
    border-bottom: 1px solid #333;
    gap: 8px;
  }

  aside .logo img { width: 36px; height: 36px; }
  aside .logo h1 { font-size: 24px; font-weight: 700; color: var(--raiffeisen-yellow); letter-spacing: 1px; }

  nav {
    flex-grow: 1;
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    font-weight: 600;
    font-size: 14px;
  }

  nav a {
    color: #ccc;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 10px 12px;
    border-radius: 12px;
    transition: all 0.3s ease;
  }

  nav a:hover {
    color: var(--raiffeisen-yellow);
    background: rgba(255, 230, 0, 0.1);
    transform: translateX(5px);
  }

  /* Centered Card */
  .card-container {
    position: relative;
    background: linear-gradient(145deg, #111111, #222222);
    border-radius: 24px;
    padding: 40px;
    width: 420px;
    box-shadow: 0 0 30px rgba(255, 230, 0, 0.5), 0 20px 50px rgba(0,0,0,0.7);
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    animation: float 6s ease-in-out infinite;
  }

  @keyframes float {
    0%,100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
  }

  .tab-navigation {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 28px;
  }

  .tab-navigation span {
    font-size: 14px;
    font-weight: 600;
    color: #888;
    cursor: default;
    padding-bottom: 6px;
    transition: all 0.3s ease;
  }

  .tab-navigation span.active {
    color: var(--raiffeisen-yellow);
    border-bottom: 2px solid var(--raiffeisen-yellow);
    transform: scale(1.1);
  }

  .payment-header {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 20px;
    color: #fff;
    text-shadow: 0 0 6px var(--raiffeisen-yellow);
  }

  .card-info {
    display: flex;
    align-items: center;
    gap: 16px;
    background: rgba(255,255,255,0.05);
    padding: 16px 20px;
    border-radius: 16px;
    margin-bottom: 24px;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .card-info:hover {
    background: rgba(255,255,0,0.2);
    transform: scale(1.02);
  }

  .card-info i {
    color: var(--raiffeisen-yellow);
    font-size: 24px;
  }

  .price-details {
    font-size: 14px;
    color: #ccc;
    margin-bottom: 28px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    width: 100%;
    text-align: left;
  }

  .price-details .row {
    display: flex;
    justify-content: space-between;
  }

  .price-details .total {
    font-weight: 700;
    color: #fff;
    border-top: 1px solid #444;
    padding-top: 12px;
    margin-top: 12px;
    font-size: 16px;
    text-shadow: 0 0 4px #fff;
  }

  hr { border: 1px solid #444; margin-bottom: 28px; }

  /* Progress Bar */
  .progress-container {
    width: 100%;
    background: rgba(255,255,255,0.1);
    border-radius: 50px;
    overflow: hidden;
    margin-bottom: 24px;
  }

  .progress-bar {
    height: 10px;
    width: 0%;
    background: var(--raiffeisen-yellow);
    border-radius: 50px;
    transition: width 1s ease;
  }

  /* Pay Button */
  .pay-button {
    width: 100%;
    padding: 16px;
    border-radius: 50px;
    background: var(--raiffeisen-yellow);
    color: #000;
    font-weight: 700;
    border: none;
    cursor: pointer;
    font-size: 16px;
    transition: all 0.3s ease;
    box-shadow: 0 6px 20px rgba(255,230,0,0.6), 0 0 15px rgba(255,255,255,0.2) inset;
  }

  .pay-button:hover {
    background: #e6be00;
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(255,230,0,0.8), 0 0 20px rgba(255,255,255,0.3) inset;
  }

  /* Gamified tooltips */
  .tooltip {
    position: relative;
    cursor: help;
  }

  .tooltip:hover::after {
    content: attr(data-tip);
    position: absolute;
    bottom: 120%;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0,0,0,0.9);
    color: var(--raiffeisen-yellow);
    padding: 6px 12px;
    border-radius: 8px;
    white-space: nowrap;
    font-size: 12px;
    z-index: 100;
    box-shadow: 0 0 10px rgba(255,230,0,0.5);
  }

  @media (max-width: 768px) {
    .card-container { width: 90%; padding: 28px; }
    aside { width: 180px; }
  }
</style>
</head>
<body>

<!-- Sidebar -->
<aside>
  <div class="logo">
    <img src="logo.png" alt="Raiffeisen Logo">
    <h1>Raiffeisen</h1>
  </div>
  <nav>
    <a href="dashboard.php"><i class="fas fa-university"></i>My Bank</a>
    <a href="cards.php"><i class="fas fa-credit-card"></i>Cards</a>
    <a href="lessons.php"><i class="fas fa-users"></i>Lessons</a>
    <a href="loan.php"><i class="fas fa-users"></i>Loan</a>
    <a href="transfer.php"><i class="fas fa-exchange-alt"></i>Fund Transfer</a>
    <a href="logout.php"><i class="fas fa-sign-in-alt"></i>Logout</a>
  </nav>
</aside>

<!-- Main Card -->
<div class="card-container">
  <div class="tab-navigation">
    <span></span>
    <span class="active">Transfer Details</span>
    <span></span>
  </div>

  <div class="payment-header">Transfer Method</div>

  <div class="card-info tooltip" data-tip="Select your preferred transfer method">
    <i class="fas fa-credit-card"></i>
    <span>Internal Bank Transfer</span>
  </div>

  <div class="progress-container">
    <div class="progress-bar" id="progressBar"></div>
  </div>

  <div class="price-details">
    <div class="row"><span>Recipient:</span><span>John Doe</span></div>
    <div class="row tooltip" data-tip="The IBAN of your recipient"><span>IBAN:</span><span>AL47212110090000000235698741</span></div>
    <div class="row"><span>Bank:</span><span>Raiffeisen Bank Albania</span></div>
    <div class="row total"><span>Amount</span><span>€250</span></div>
  </div>

  <hr/>

  <button class="pay-button" onclick="startTransfer()">CONFIRM & TRANSFER €250</button>
</div>

<script>
  // Gamified progress bar
  function startTransfer() {
    const progress = document.getElementById('progressBar');
    progress.style.width = '0%';
    let width = 0;
    const interval = setInterval(() => {
      width += 5;
      progress.style.width = width + '%';
      if(width >= 100) {
        clearInterval(interval);
        alert("🎉 Transfer Completed Successfully!");
      }
    }, 100);
  }
</script>

</body>
</html>
