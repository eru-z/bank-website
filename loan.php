<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Loan Application - Raiffeisen Youth Bank</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
<style>
body {
  font-family: 'Inter', sans-serif;
  background-color: #0f0f0f;
  margin: 0;
  color: #fff;
}

:root { --raiffeisen-yellow: #fee600; }

.loan-container {
  max-width: 900px;
  margin: 3rem auto;
  display: flex;
  flex-direction: column;
  md:flex-row;
  background-color: #111;
  border-radius: 2xl;
  overflow: hidden;
  box-shadow: 0 8px 25px rgba(0,0,0,0.7);
}

.left-panel {
  background-color: #000;
  padding: 2rem;
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.left-panel h2 {
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--raiffeisen-yellow);
  margin-bottom: 1rem;
}

.left-panel p, .contact-info div {
  font-size: 0.875rem;
  color: #ccc;
  line-height: 1.5;
}

.contact-info .flex i {
  color: var(--raiffeisen-yellow);
}

.left-panel img {
  border-radius: 50%;
  margin-top: 2rem;
  width: 120px;
  height: 120px;
  object-fit: cover;
}

.right-panel {
  flex: 2;
  padding: 2rem;
}

.right-panel label {
  font-size: 0.75rem;
  color: #ccc;
  margin-bottom: 0.25rem;
  font-weight: 500;
}

.right-panel input, .right-panel textarea {
  width: 100%;
  padding: 0.5rem 0.5rem;
  border: none;
  border-bottom: 2px solid #444;
  background: transparent;
  color: #fff;
  font-weight: 600;
  margin-bottom: 1.5rem;
}

.right-panel input:focus, .right-panel textarea:focus {
  outline: none;
  border-bottom-color: var(--raiffeisen-yellow);
}

textarea { resize: none; color: #ccc; }

.btn {
  background-color: var(--raiffeisen-yellow);
  color: #000;
  font-weight: 600;
  padding: 0.75rem 1.5rem;
  border-radius: 0.5rem;
  cursor: pointer;
  transition: all 0.2s;
  text-align: center;
}

.btn:hover {
  background-color: #ca8a04;
  color: #fff;
  transform: translateY(-2px) scale(1.02);
}

.header {
  max-width: 900px;
  margin: 2rem auto 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.header h1 {
  color: var(--raiffeisen-yellow);
  font-weight: 600;
  font-size: 1.5rem;
}

.header a {
  color: var(--raiffeisen-yellow);
  font-weight: 500;
  text-decoration: none;
}

.header a:hover { text-decoration: underline; }

@media (min-width: 768px) {
  .loan-container { flex-direction: row; }
}
</style>
</head>
<body>

<div class="header">
  <h1>Loan Application</h1>
  <a href="dashboard.php">← Back to Dashboard</a>
</div>

<div class="loan-container">
  <!-- Left Panel -->
  <div class="left-panel">
    <div>
      <h2>Loan Application Form</h2>
      <p>Apply for your loan with Raiffeisen Bank. Flexible terms & personalized solutions to suit your needs.</p>
      <div class="contact-info mt-6 space-y-3">
        <div class="flex items-center space-x-3">
          <i class="fas fa-phone-alt"></i>
          <div>+355 45 123 456</div>
        </div>
        <div class="flex items-center space-x-3">
          <i class="fas fa-envelope"></i>
          <div>support@raiffeisen.al</div>
        </div>
        <div class="flex items-center space-x-3">
          <i class="fas fa-map-marker-alt"></i>
          <div>Tirana, Albania</div>
        </div>
      </div>
    </div>
    <img src="logo.png" alt="Raiffeisen Logo">
  </div>

  <!-- Right Panel -->
  <form action="submit_loan.php" class="right-panel" method="POST">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
      <div>
        <label for="loanAmount">Loan Amount</label>
        <input id="loanAmount" name="loanAmount" type="number" placeholder="Enter loan amount" min="1000" required>
      </div>
      <div>
        <label for="loanTerm">Loan Term (Years)</label>
        <input id="loanTerm" name="loanTerm" type="number" placeholder="Enter loan term" min="1" required>
      </div>
      <div class="md:col-span-2">
        <label for="name">Full Name</label>
        <input id="name" name="name" type="text" placeholder="Enter your full name" required>
      </div>
      <div class="md:col-span-2">
        <label for="email">Email Address</label>
        <input id="email" name="email" type="email" placeholder="Enter your email" required>
      </div>
      <div class="md:col-span-2">
        <label for="message">Additional Information (Optional)</label>
        <textarea id="message" name="message" placeholder="Write additional details" rows="3"></textarea>
      </div>
    </div>

    <div class="mt-6 flex flex-col sm:flex-row justify-between gap-4">
      <button class="btn" type="submit">Submit Application</button>
      <a href="dashboard.php" class="btn">← Go Back to Dashboard</a>
    </div>
  </form>
</div>

</body>
</html>
