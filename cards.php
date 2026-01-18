<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Raiffeisen Youth Bank - My Cards</title>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

<style>
  body {
    font-family: 'Inter', sans-serif;
    background: #0f0f0f;
    margin: 0;
    color: #fff;
  }

  :root { --raiffeisen-yellow: #fee600; }

  /* Sidebar */
  aside {
    width: 16rem;
    background-color: #000;
    color: #fff;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    z-index: 30;
  }

  .logo {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 5rem;
    border-bottom: 1px solid #222;
  }

  .nav-links {
    flex: 1;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    font-weight: 600;
  }

  .nav-links a {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    text-decoration: none;
    color: inherit;
    transition: all 0.2s;
  }

  .nav-links a:hover { color: var(--raiffeisen-yellow); transform: scale(1.05); }

  /* Main */
  .main { margin-left: 16rem; }

  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 1.5rem;
    height: 5rem;
    background: #111;
    border-bottom: 1px solid #222;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
  }

  header h1 { color: var(--raiffeisen-yellow); font-weight: bold; font-size: 1.5rem; }
  header a { color: var(--raiffeisen-yellow); font-weight: 600; }
  header a:hover { text-decoration: underline; }

  main {
    margin-top: 1rem;
    padding: 1.5rem;
    display: grid;
    gap: 1.5rem;
    grid-template-columns: 1fr;
  }

  @media (min-width: 768px) { main { grid-template-columns: repeat(2, 1fr); } }
  @media (min-width: 1024px) { main { grid-template-columns: repeat(3, 1fr); } }

  /* Cards */
  .card {
    background-color: #1a1a1a;
    border-left: 6px solid var(--raiffeisen-yellow);
    border-radius: 1rem;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    box-shadow: 0 6px 15px rgba(0,0,0,0.5);
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: pointer;
  }

  .card:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 10px 25px rgba(255, 230, 0, 0.4);
  }

  .card-title { font-weight: bold; font-size: 1.2rem; color: var(--raiffeisen-yellow); }
  .card-number { color: #ccc; font-size: 0.875rem; letter-spacing: 2px; margin-top: 0.25rem; }

  .card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1rem;
  }

  .status {
    font-size: 0.75rem;
    font-weight: bold;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    background: linear-gradient(135deg, #fde68a, #facc15);
    color: #000;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
  }

  .status.frozen {
    background: linear-gradient(135deg, #fef9c3, #fde047);
    color: #000;
  }

  .actions { margin-top: 1rem; display: flex; gap: 0.5rem; }

  .btn {
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    transition: transform 0.2s, background 0.2s;
  }

  .btn:hover { transform: translateY(-2px); }
  .btn-freeze { background-color: var(--raiffeisen-yellow); color: #000; }
  .btn-freeze:hover { background-color: #ca8a04; color: #fff; }
  .btn-statement { background-color: #111; color: var(--raiffeisen-yellow); border: 1px solid var(--raiffeisen-yellow); }
  .btn-statement:hover { background-color: #000; color: var(--raiffeisen-yellow); }

  .add-card {
    background: linear-gradient(145deg, #fde68a, #facc15);
    color: #000;
    border-radius: 1rem;
    box-shadow: 0 6px 15px rgba(0,0,0,0.5);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 2rem;
    font-weight: bold;
    transition: transform 0.3s, box-shadow 0.3s;
    text-align: center;
    cursor: pointer;
  }

  .add-card:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 10px 25px rgba(255, 230, 0, 0.5);
  }

  .add-card i { font-size: 3rem; margin-bottom: 0.75rem; }
</style>
</head>

<body>
  <!-- Sidebar -->
  <aside>
    <div class="logo">
      <img src="logo.png" alt="Raiffeisen Logo" style="width: 2rem; height: 2rem; margin-right: 0.5rem;">
      <h1>Raiffeisen</h1>
    </div>
    <nav class="nav-links">
      <a href="dashboard.php"><i class="fas fa-university"></i> My Bank</a>
      <a href="cards.php"><i class="fas fa-credit-card"></i> Cards</a>
      <a href="lessons.php"><i class="fas fa-users"></i> Lessons</a>
      <a href="loan.php"><i class="fas fa-users"></i> Loan</a>
      <a href="transfer.php"><i class="fas fa-exchange-alt"></i> Fund Transfer</a>
      <a href="logout.php"><i class="fas fa-sign-in-alt"></i> Logout</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="main">
    <header>
      <h1>My Cards</h1>
      <a href="dashboard.php">← Back to Dashboard</a>
    </header>

    <main>
      <!-- Card 1 -->
      <div class="card">
        <div>
          <p class="card-title">Visa Debit</p>
          <p class="card-number">**** **** **** 1234</p>
        </div>
        <div class="card-footer">
          <p>Valid Thru: 12/26</p>
          <span class="status">Active</span>
        </div>
        <div class="actions">
          <button class="btn btn-freeze"><i class="fas fa-lock"></i> Freeze</button>
          <button class="btn btn-statement"><i class="fas fa-file-invoice-dollar"></i> Statement</button>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="card">
        <div>
          <p class="card-title">Mastercard Credit</p>
          <p class="card-number">**** **** **** 5678</p>
        </div>
        <div class="card-footer">
          <p>Valid Thru: 08/27</p>
          <span class="status frozen">Frozen</span>
        </div>
        <div class="actions">
          <button class="btn btn-freeze"><i class="fas fa-unlock"></i> Unfreeze</button>
          <button class="btn btn-statement"><i class="fas fa-file-invoice-dollar"></i> Statement</button>
        </div>
      </div>

      <!-- Add New Card -->
      <div class="add-card">
        <i class="fas fa-plus-circle"></i>
        <button>Request New Card</button>
      </div>
    </main>
  </div>
</body>
</html>
