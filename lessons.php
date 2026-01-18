<?php
session_start();
$lessons = [
    ['id' => 1, 'title' => 'Mastering Monthly Budget', 'desc' => 'Learn how to allocate income wisely and avoid overspending.'],
    ['id' => 2, 'title' => 'Smart Saving Strategies', 'desc' => 'Build habits to grow your financial reserves and plan ahead.'],
    ['id' => 3, 'title' => 'How Banks Empower You', 'desc' => 'Understand how Raiffeisen Bank supports your financial journey.']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Raiffeisen Bank – Financial Lessons</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

<style>
body {
    font-family: 'Inter', sans-serif;
    margin:0;
    background: linear-gradient(135deg, #000000 0%, #1f1f1f 100%);
    min-height:100vh;
    overflow-x:hidden;
}

/* Sidebar */
#sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 260px;
    height: 100%;
    background-color: #111;
    padding: 24px;
    box-shadow: 2px 0 10px rgba(0,0,0,0.3);
    display:flex;
    flex-direction:column;
}
#sidebar .logo {
    display: flex;
    align-items: center;
    margin-bottom: 32px;
}
#sidebar .logo img {width:40px;height:40px;margin-right:10px;}
#sidebar nav a {
    display:flex; align-items:center; gap:10px;
    margin-bottom:16px; text-decoration:none;
    color:#fff; font-weight:500;
    padding:8px 12px; border-radius:8px;
    transition: all 0.2s ease;
}
#sidebar nav a:hover{
    color:#FFD400;
    transform:translateX(4px);
}

/* Main content */
main {
    margin-left:260px;
    padding:32px;
}
.container {
    max-width:1200px;
    margin:0 auto;
}
.main-title {
    text-align:center;
    font-size:2.5rem;
    font-weight:800;
    color:#FFD400;
    text-shadow:0 0 15px #FFD40055;
    margin-bottom:40px;
}

/* Grid */
.grid {
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:24px;
}

/* Lesson card */
.lesson-card {
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(12px);
    border-radius:16px;
    padding:24px;
    color:white;
    box-shadow:0 8px 20px rgba(0,0,0,0.5);
    transition: all 0.3s ease;
    position:relative;
    overflow:hidden;
}
.lesson-card::before {
    content:'';
    position:absolute; top:0; left:0; width:100%; height:100%;
    background:linear-gradient(135deg,#FFD40055,#FFAA0055);
    opacity:0;
    transition:opacity 0.3s ease;
    border-radius:16px;
}
.lesson-card:hover::before {
    opacity:0.15;
}
.lesson-card:hover {
    transform:translateY(-5px) scale(1.02);
    box-shadow:0 15px 30px rgba(255,215,0,0.3);
}

.lesson-header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:12px;
}
.lesson-title {
    font-size:1.25rem;
    font-weight:700;
    color:#FFD400;
}
.lesson-desc {
    font-size:0.95rem;
    color:#ddd;
}

/* Start button */
.start-btn {
    display:inline-block;
    margin-top:16px;
    padding:10px 20px;
    font-size:0.95rem;
    font-weight:600;
    color:#1f2937;
    background:linear-gradient(90deg,#FFD400,#FFAA00);
    border:none;
    border-radius:8px;
    text-decoration:none;
    transition: all 0.3s ease;
}
.start-btn:hover {
    background:linear-gradient(90deg,#FFE847,#FFCC33);
    transform:translateY(-2px);
}

/* Responsive */
@media(max-width:768px){
    #sidebar{display:none;}
    main{margin-left:0;padding:16px;}
}
</style>
</head>
<body>

<!-- Sidebar -->
<aside id="sidebar">
    <div class="logo">
        <img src="logo.png" alt="Raiffeisen Logo">
        <h1 style="color:#FFD400;font-weight:bold;">Raiffeisen</h1>
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

<main>
<div class="container">
    <h2 class="main-title">Financial Education Center</h2>
    <div class="grid">
        <?php 
        $quizFiles = ['quiz1.php','quiz2.php','quiz3.php'];
        $i = 0;
        foreach($lessons as $lesson):
            $quizFile = $quizFiles[$i] ?? 'quiz1.php';
        ?>
        <div class="lesson-card">
            <div class="lesson-header">
                <h3 class="lesson-title"><?php echo $lesson['title']; ?></h3>
                <i class="fas fa-book-open" style="color:#fff"></i>
            </div>
            <p class="lesson-desc"><?php echo $lesson['desc']; ?></p>
            <a href="<?php echo $quizFile; ?>?id=<?php echo $lesson['id']; ?>" class="start-btn">Start Lesson</a>
        </div>
        <?php $i++; endforeach; ?>
    </div>
</div>
</main>

</body>
</html>
