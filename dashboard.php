<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Raiffeisen Youth Bank Dashboard</title>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

<!-- Google Fonts: Inter -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');

body {
    font-family: 'Inter', sans-serif;
    background: radial-gradient(circle at 10% 20%, #000000 0%, #1f1f1f 100%);
    min-height: 100vh;
    color: #fff;
}

/* Particle canvas */
#particles {
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: -1;
}

/* Sidebar */
#sidebar {
    position: fixed;
    top: 0; left: 0;
    width: 260px; height: 100%;
    background: rgba(0,0,0,0.85);
    backdrop-filter: blur(10px);
    display: flex; flex-direction: column;
    padding: 1.5rem;
    box-shadow: 2px 0 15px rgba(0,0,0,0.5);
    z-index: 50;
}
#sidebar .logo { display:flex; align-items:center; margin-bottom:2rem;}
#sidebar .logo img {width:40px;height:40px;margin-right:10px;}
#sidebar nav a {
    display:flex; align-items:center; gap:12px;
    padding:10px 14px; margin-bottom:12px;
    border-radius:8px;
    color:#fff; font-weight:600;
    transition: all 0.3s ease;
}
#sidebar nav a:hover {
    transform: translateX(5px);
    color: #FFD400;
}

/* Main content */
main {
    margin-left:260px;
    padding:2rem;
}

/* Header */
header {
    display:flex; justify-content:space-between; align-items:center;
    backdrop-filter: blur(10px); background: rgba(0,0,0,0.7);
    padding:1rem 2rem; border-radius:12px;
    box-shadow:0 4px 15px rgba(0,0,0,0.3);
    margin-bottom:2rem;
}

/* Cards */
.card {
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(12px);
    border-radius:20px;
    padding:1.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 10px 25px rgba(0,0,0,0.5);
    position: relative;
}
.card:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 15px 35px rgba(255,215,0,0.4);
}

/* Buttons */
.btn-yellow {
    background: linear-gradient(90deg,#FFD400,#FFAA00);
    color: #000; font-weight:700; padding:0.75rem 1.5rem;
    border-radius:12px; transition: all 0.3s ease;
}
.btn-yellow:hover {
    background: linear-gradient(90deg,#FFE847,#FFCC33);
    transform: translateY(-2px);
}

/* Gamified progress bar */
.progress-container {
    background: rgba(255,255,255,0.1);
    border-radius:12px; overflow:hidden;
    height:12px;
}
.progress-bar {
    height:100%; background: #FFD400;
    width:0%; transition: width 1.5s ease;
}

/* Transactions list */
.transaction-item {
    display:flex; justify-content:space-between; align-items:center;
    border-b: 1px solid rgba(255,255,255,0.2); padding:0.75rem 0;
}

/* Responsive */
@media(max-width:768px){
    #sidebar { transform: translateX(-100%); transition: transform 0.3s; }
    main { margin-left:0; padding:1rem; }
}
</style>
</head>
<body>

<canvas id="particles"></canvas>

<!-- Sidebar -->
<aside id="sidebar">
    <div class="logo">
        <img src="logo.png" alt="Raiffeisen Logo">
        <h1 class="text-2xl font-bold text-[#FFD400]">Raiffeisen</h1>
    </div>
    <nav>
        <a href="dashboard.php"><i class="fas fa-university"></i> My Bank</a>
        <a href="cards.php"><i class="fas fa-credit-card"></i> Cards</a>
        <a href="lessons.php"><i class="fas fa-users"></i> Lessons</a>
        <a href="loan.php"><i class="fas fa-money-bill-wave"></i> Loan</a>
        <a href="transfer.php"><i class="fas fa-exchange-alt"></i> Fund Transfer</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>
</aside>

<!-- Main Content -->
<div class="flex-1 flex flex-col md:ml-60"> <!-- Reduced from md:ml-64 to md:ml-20 -->
<header class="mx-4 md:mx-0"> <!-- added some margin for smaller screens -->
    <input type="text" placeholder="Search..." class="rounded-full px-4 py-2 w-64 text-black focus:outline-none focus:ring-2 focus:ring-[#FFD400]" />
    <img src="https://plus.unsplash.com/premium_photo-1689568126014-06fea9d5d341?fm=jpg&q=60&w=3000" alt="Profile" class="w-12 h-12 rounded-full border-2 border-[#FFD400]" />
</header>

<main class="space-y-6 mx-4 md:mx-0"> <!-- added margin adjustments -->
    <!-- Balance Card -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="card col-span-2">
            <h2 class="text-[#FFD400] font-semibold">Account Balance</h2>
            <p class="text-4xl font-bold mt-2">€5,400.00</p>
            <div class="progress-container mt-4">
                <div class="progress-bar" id="balanceProgress"></div>
            </div>
        </div>
        <div class="card flex items-center justify-center">
            <button class="btn-yellow">➡️ Send Money</button>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="card text-center cursor-pointer"><i class="fas fa-plus-circle text-3xl text-[#FFD400]"></i><h4 class="mt-2 font-semibold text-[#FFD400]">Add Transaction</h4></div>
        <div class="card text-center cursor-pointer"><i class="fas fa-chart-line text-3xl text-[#FFD400]"></i><h4 class="mt-2 font-semibold text-[#FFD400]">View Reports</h4></div>
        <div class="card text-center cursor-pointer"><i class="fas fa-credit-card text-3xl text-[#FFD400]"></i><h4 class="mt-2 font-semibold text-[#FFD400]">View Cards</h4></div>
    </div>

    <!-- Transactions & Chart -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="card col-span-2">
            <h3 class="font-bold text-[#FFD400] mb-4">Recent Transactions</h3>
            <ul id="transactionList"></ul>
        </div>
        <div class="card">
            <h3 class="font-bold text-[#FFD400] mb-4">Spending This Month</h3>
            <canvas id="spendingChart"></canvas>
        </div>
    </div>
</main>
</div>


<main class="space-y-6">
    <!-- Balance Card -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="card col-span-2">
            <h2 class="text-[#FFD400] font-semibold">Account Balance</h2>
            <p class="text-4xl font-bold mt-2">€5,400.00</p>
            <div class="progress-container mt-4">
                <div class="progress-bar" id="balanceProgress"></div>
            </div>
        </div>
        <div class="card flex items-center justify-center">
            <button class="btn-yellow">➡️ Send Money</button>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="card text-center cursor-pointer"><i class="fas fa-plus-circle text-3xl text-[#FFD400]"></i><h4 class="mt-2 font-semibold text-[#FFD400]">Add Transaction</h4></div>
        <div class="card text-center cursor-pointer"><i class="fas fa-chart-line text-3xl text-[#FFD400]"></i><h4 class="mt-2 font-semibold text-[#FFD400]">View Reports</h4></div>
        <div class="card text-center cursor-pointer"><i class="fas fa-credit-card text-3xl text-[#FFD400]"></i><h4 class="mt-2 font-semibold text-[#FFD400]">View Cards</h4></div>
    </div>

    <!-- Transactions & Chart -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="card col-span-2">
            <h3 class="font-bold text-[#FFD400] mb-4">Recent Transactions</h3>
            <ul id="transactionList"></ul>
        </div>
        <div class="card">
            <h3 class="font-bold text-[#FFD400] mb-4">Spending This Month</h3>
            <canvas id="spendingChart"></canvas>
        </div>
    </div>
</main>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>
<script>
// Particle background
tsParticles.load("particles", {
    particles: {
        number: { value: 80 },
        color: { value: "#FFD400" },
        shape: { type: "circle" },
        opacity: { value: 0.4 },
        size: { value: { min: 1, max: 4 } },
        move: { enable: true, speed: 1 }
    }
});

// Animate balance progress
window.addEventListener('DOMContentLoaded', () => {
    const bar = document.getElementById('balanceProgress');
    setTimeout(() => { bar.style.width = '75%'; }, 800);

    const transactions = [
        {desc:'Coffee', date:'2025-08-16', amt:'-€4.50'},
        {desc:'Amazon', date:'2025-08-15', amt:'-€120.00'},
        {desc:'Salary', date:'2025-08-14', amt:'+€2,000.00'},
        {desc:'Electricity', date:'2025-08-13', amt:'-€75.00'}
    ];
    const list = document.getElementById('transactionList');
    transactions.forEach(tx=>{
        const li = document.createElement('li');
        li.className='transaction-item';
        li.innerHTML=`<div><p class="font-semibold text-[#FFD400]">${tx.desc}</p><p class="text-sm text-[#FFD400]">${tx.date}</p></div><div class="${tx.amt.startsWith('+')?'text-green-500':'text-red-500'} font-bold">${tx.amt}</div>`;
        list.appendChild(li);
    });

    // Chart
    const ctx = document.getElementById('spendingChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels:['Rent','Food','Shopping','Bills','Others'],
            datasets:[{label:'Expenses',data:[500,300,200,100,100], backgroundColor:['#FFD400','#FFC800','#FFB700','#FFA800','#000000'], borderRadius:8}]
        },
        options:{responsive:true, plugins:{legend:{display:false}}, scales:{y:{beginAtZero:true}}}
    });
});
</script>
</body>
</html>
