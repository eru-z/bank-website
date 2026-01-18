<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Raiffeisen Youth Bank</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.10.2/lottie.min.js"></script>
<style>
/* Basic Reset */
*{margin:0;padding:0;box-sizing:border-box;font-family:'Roboto',sans-serif;}
body{background:#0a0a0a;color:#fff;overflow-x:hidden;scroll-behavior:smooth;}
a{text-decoration:none;}
/* Navbar */
.nav{display:flex;justify-content:space-between;align-items:center;padding:15px 30px;background:rgba(0,0,0,0.7);position:sticky;top:0;z-index:100;backdrop-filter:blur(10px);}
.logo{font-size:1.5rem;font-weight:700;color:#fde700;text-shadow:0 0 15px #fde700;}
.button-group{display:flex;gap:15px;}
.btn{padding:8px 20px;border-radius:50px;border:2px solid #fde700;color:#fde700;font-weight:600;position:relative;overflow:hidden;transition:all 0.3s;}
.btn:hover{background:#fde700;color:#000;box-shadow:0 0 20px #fde700,0 0 40px #ffd700;}
/* Hero */
.hero-section{position:relative;text-align:center;padding:100px 20px 80px;overflow:hidden;}
.hero-bg-particles{position:absolute;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:1;}
.hero-section h1{font-size:2.8rem;color:#fde700;text-shadow:0 0 20px #ffd700;position:relative;z-index:2;animation:fadeInDown 1s ease forwards;}
.hero-section p{font-size:1.1rem;color:#ccc;max-width:600px;margin:15px auto 30px;line-height:1.6;position:relative;z-index:2;animation:fadeInUp 1s ease forwards;}
.quiz-button{display:inline-block;background:linear-gradient(45deg,#ffd700,#fccd00);color:#000;padding:15px 35px;border-radius:50px;font-weight:700;box-shadow:0 0 25px #ffd700,0 0 50px #fde700;transition:all 0.3s ease;animation:float 3s ease-in-out infinite;position:relative;z-index:2;}
.quiz-button:hover{transform:scale(1.1);box-shadow:0 0 40px #ffd700,0 0 80px #fde700;}
@keyframes float{0%,100%{transform:translateY(0);}50%{transform:translateY(-15px);}}
@keyframes fadeInDown{0%{opacity:0;transform:translateY(-20px);}100%{opacity:1;transform:translateY(0);}}
@keyframes fadeInUp{0%{opacity:0;transform:translateY(20px);}100%{opacity:1;transform:translateY(0);}}

/* Sections */
section{max-width:1100px;margin:40px auto;padding:30px 20px;border-radius:20px;background:rgba(30,30,30,0.85);box-shadow:0 15px 40px rgba(0,0,0,0.7);backdrop-filter:blur(10px);transition:transform 0.4s ease,box-shadow 0.4s ease;overflow:hidden;opacity:0;transform:translateY(40px);}
section.visible{opacity:1;transform:translateY(0);}
.section-title{font-size:2.5rem;color:#fde700;text-align:center;margin-bottom:40px;text-shadow:0 0 15px #ffd700;}

/* Cards */
.money-concepts,.badge-grid,.testimonial-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;}
.concept-card,.badge-card,.testimonial-card{background:linear-gradient(145deg,#1a1a1a,#222);border-radius:20px;padding:20px;box-shadow:0 10px 35px rgba(0,0,0,0.5);transition:all 0.4s ease;position:relative;overflow:hidden;cursor:pointer;}
.concept-card:hover,.badge-card:hover,.testimonial-card:hover{transform:translateY(-12px) rotateX(2deg) rotateY(2deg);box-shadow:0 15px 45px rgba(255,215,0,0.7);}
.concept-card h3,.badge-card h3{color:#fde700;margin-bottom:10px;}
.testimonial-author{margin-top:10px;font-weight:700;color:#ffd700;text-align:right;}
.concept-card i,.badge-card i{font-size:2.5rem;color:#ffd700;position:absolute;top:-15px;right:-15px;opacity:0.15;transform:rotate(25deg);}

/* Budget & Newsletter */
.budget-calculator,.newsletter-form{display:flex;flex-wrap:wrap;justify-content:center;gap:15px;margin-top:20px;}
.budget-input,.newsletter-input{padding:12px;flex:1 1 180px;border-radius:25px;border:none;outline:none;background:#333;color:#fff;font-size:1rem;}
.budget-btn,.newsletter-btn{background:linear-gradient(45deg,#fde700,#ffd700);color:#000;padding:12px 30px;border-radius:50px;font-weight:700;border:none;cursor:pointer;box-shadow:0 0 20px #ffd700;transition:transform 0.3s ease,box-shadow 0.3s ease;}
.budget-btn:hover,.newsletter-btn:hover{transform:scale(1.08);box-shadow:0 0 35px #ffd700;}

/* Progress Bar */
.progress-bar{width:100%;height:20px;background:#333;border-radius:50px;margin-bottom:10px;overflow:hidden;}
.progress{width:0%;height:100%;background:linear-gradient(90deg,#fde700,#ffd700);border-radius:50px;transition:width 0.7s ease;position:relative;}
.coin{position:absolute;width:12px;height:12px;background:#ffd700;border-radius:50%;top:-6px;animation:coinMove 1s linear infinite;}
@keyframes coinMove{0%{transform:translateX(0);}100%{transform:translateX(100%);}}

/* Social */
.social-links{display:flex;justify-content:center;gap:20px;margin-top:20px;}
.social-links a{color:#fde700;font-size:1.5rem;position:relative;transition:all 0.3s;}
.social-links a:hover{transform:translateY(-4px);}
.social-links a::after{content:"";position:absolute;width:0%;height:2px;bottom:-4px;left:0;background:#ffd700;transition:0.3s;}
.social-links a:hover::after{width:100%;}

/* Footer */
.footer{background:#000;padding:40px 20px 20px;text-align:center;color:#fff;}
.footer-content{display:flex;flex-wrap:wrap;justify-content:center;gap:40px;margin-bottom:20px;}
.footer-section h3{color:#fde700;margin-bottom:10px;}
.footer-section ul li a{color:#fff;text-decoration:none;transition:0.3s;}
.footer-section ul li a:hover{color:#fde700;}

/* Particles */
.particle{position:absolute;width:4px;height:4px;background:rgba(255,215,0,0.8);border-radius:50%;animation:particleFloat 5s linear infinite;}
@keyframes particleFloat{0%{transform:translateY(0) translateX(0);}50%{transform:translateY(-30px) translateX(10px);}100%{transform:translateY(0) translateX(0);}}

/* Animations */
@media(max-width:768px){.hero-section h1{font-size:2.3rem;}.section-title{font-size:2rem;}}
@media(max-width:480px){.hero-section h1{font-size:1.8rem;}.budget-input,.newsletter-input{flex:1 1 140px;}}
</style>
</head>
<body>

<nav class="nav">
    <a href="#" class="logo">Raiffeisen Youth Bank</a>
    <div class="button-group">
        <a href="register.php" class="btn">Sign Up</a>
        <a href="login.php" class="btn">Log In</a>
    </div>
</nav>

<main>
<section class="hero-section">
    <div id="hero-lottie" style="width:200px;height:200px;margin:0 auto;position:relative;z-index:2;"></div>
    <div class="hero-bg-particles" id="particles"></div>
    <h1>Welcome to Smart Money</h1>
    <p>Learn to manage, save, and grow your money, while having fun!</p>
    <a href="quizes.php" class="quiz-button">Take the Quiz</a>
</section>

<section id="learn">
    <h2 class="section-title">How Money Works</h2>
    <div class="money-concepts">
        <div class="concept-card"><i class="fas fa-coins"></i><h3>Earning</h3><p>Earn via jobs, freelancing, and smart ideas!</p></div>
        <div class="concept-card"><i class="fas fa-piggy-bank"></i><h3>Saving</h3><p>Save smarter and reach goals faster!</p></div>
        <div class="concept-card"><i class="fas fa-shopping-cart"></i><h3>Spending</h3><p>Spend wisely and enjoy your money!</p></div>
    </div>
</section>

<section id="save">
    <h2 class="section-title">Budget Calculator</h2>
    <div class="budget-calculator">
        <input type="number" id="income" class="budget-input" placeholder="Monthly income">
        <input type="number" id="expenses" class="budget-input" placeholder="Monthly expenses">
        <button class="budget-btn" onclick="calculateSavings()">Calculate</button>
    </div>
    <p id="savings-result" style="text-align:center;margin-top:10px;"></p>
</section>

<section>
    <h2 class="section-title">Your Savings Progress</h2>
    <div class="progress-bar"><div class="progress" id="progress-bar"></div></div>
    <p style="text-align:center;">Keep it up! You’re getting closer to your goal!</p>
</section>

<section id="play">
    <h2 class="section-title">Your Rewards</h2>
    <div class="badge-grid">
        <div class="badge-card"><i class="fas fa-medal"></i><h3>Bronze</h3><p>Complete 3 lessons</p></div>
        <div class="badge-card"><i class="fas fa-medal"></i><h3>Silver</h3><p>Complete 6 lessons</p></div>
        <div class="badge-card"><i class="fas fa-medal"></i><h3>Gold</h3><p>Complete 10 lessons</p></div>
    </div>
</section>

<section>
    <h2 class="section-title">Testimonials</h2>
    <div class="testimonial-grid">
        <div class="testimonial-card"><p>"Saved for my first car thanks to this!"</p><p class="testimonial-author">- John D.</p></div>
        <div class="testimonial-card"><p>"Budgeting became fun and easy!"</p><p class="testimonial-author">- Sarah M.</p></div>
        <div class="testimonial-card"><p>"Quizzes are fun and informative!"</p><p class="testimonial-author">- Michael T.</p></div>
    </div>
</section>

<section>
    <h2 class="section-title">Follow Us</h2>
    <div class="social-links">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-tiktok"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook"></i></a>
    </div>
</section>

<section>
    <h2 class="section-title">Stay Updated</h2>
    <div class="newsletter-form">
        <input type="email" placeholder="Enter your email" class="newsletter-input">
        <button class="newsletter-btn" onclick="subscribeNewsletter()">Subscribe</button>
    </div>
</section>
</main>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-section"><h3>Quick Links</h3><ul><li><a href="#learn">Learn</a></li><li><a href="#save">Save</a></li><li><a href="#play">Play</a></li></ul></div>
        <div class="footer-section"><h3>Resources</h3><ul><li><a href="#save">Budget Calculator</a></li><li><a href="quizes.php">Quiz</a></li></ul></div>
        <div class="footer-section"><h3>Contact Us</h3><ul><li>Email: youth@raiffeisen.com</li><li>Phone: +1 234 567 890</li></ul></div>
    </div>
    <p>© 2025 Raiffeisen Youth Bank - Grow your financial future!</p>
</footer>

<script>
// Animate sections on scroll
const sections = document.querySelectorAll('section');
const observer = new IntersectionObserver(entries=>{
    entries.forEach(entry=>{
        if(entry.isIntersecting){entry.target.classList.add('visible');}
    });
},{threshold:0.2});
sections.forEach(section=>observer.observe(section));

// Particle effect in hero
const particlesContainer = document.getElementById('particles');
for(let i=0;i<40;i++){
    const p = document.createElement('div');
    p.classList.add('particle');
    p.style.left = Math.random()*100+'%';
    p.style.top = Math.random()*100+'%';
    p.style.width = p.style.height = Math.random()*4+2+'px';
    p.style.animationDuration = Math.random()*4+3+'s';
    particlesContainer.appendChild(p);
}

// Lottie animation in hero
lottie.loadAnimation({container:document.getElementById('hero-lottie'),renderer:'svg',loop:true,autoplay:true,path:'https://assets7.lottiefiles.com/packages/lf20_touohxv0.json'});

// Budget calculator
function calculateSavings(){
    const income = parseFloat(document.getElementById('income').value)||0;
    const expenses = parseFloat(document.getElementById('expenses').value)||0;
    const savings = Math.max(income-expenses,0);
    document.getElementById('savings-result').innerText=`You save: $${savings.toFixed(2)}`;
    const progress = document.getElementById('progress-bar');
    const percent = Math.min(savings/income*100,100);
    progress.style.width=percent+'%';
}

// Newsletter
function subscribeNewsletter(){alert('Subscribed! 🎉');}
</script>

</body>
</html>
