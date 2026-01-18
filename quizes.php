<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>Quiz Selector</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<style>
/* Reset */
*{margin:0;padding:0;box-sizing:border-box;font-family:'Roboto',sans-serif;}
body, html{height:100%;overflow:hidden;background:#000;display:flex;justify-content:center;align-items:center;padding:1rem;}

/* Particles */
.particle{position:absolute;width:6px;height:6px;background:#ffd700;border-radius:50%;opacity:0.7;animation:float 10s linear infinite;}
@keyframes float{0%{transform:translateY(0) translateX(0);}50%{transform:translateY(-80px) translateX(20px);}100%{transform:translateY(0) translateX(0);}}

/* Container */
.container{
  position:relative;
  background: rgba(0,0,0,0.65);
  backdrop-filter: blur(15px);
  border-radius: 20px;
  padding: 3rem 2rem;
  width:100%;
  max-width:360px;
  display:flex;
  flex-direction:column;
  gap:1.5rem;
  box-shadow:0 10px 30px rgba(0,0,0,0.5);
  opacity:0;
  transform:translateY(30px);
  animation:fadeIn 1s forwards;
}

/* Title */
h1{
  text-align:center;
  color:#fde700;
  font-weight:700;
  text-shadow:0 0 10px #fde700aa;
  font-size:1.8rem;
  animation:fadeIn 1s forwards 0.3s;
}

/* Buttons */
button{
  background:#fde700;
  color:#000;
  border:none;
  border-radius:15px;
  padding:1rem;
  font-size:1.2rem;
  font-weight:600;
  cursor:pointer;
  box-shadow:0 8px 20px #b59f00cc;
  transition:all 0.3s ease;
  width:100%;
  letter-spacing:1px;
}
button:hover{
  background:#e4d300;
  transform:translateY(-3px) scale(1.02);
  box-shadow:0 10px 25px #c5b200dd;
}
button:active{
  transform:translateY(0);
  box-shadow:0 5px 12px #b59f00cc;
}

/* Animations */
@keyframes fadeIn{to{opacity:1;transform:translateY(0);}}
</style>
</head>
<body>

<div id="particles-container"></div>

<div class="container" role="main" aria-label="Quiz selection">
  <h1>Select a Quiz</h1>
  <button onclick="location.href='quiz1.php'; alert('Money Matters Quiz selected!')">💰 Money Matters Quiz</button>
  <button onclick="location.href='quiz2.php'; alert('How Banks Work Quiz selected!')">🏦 How Banks Work Quiz</button>
  <button onclick="location.href='quiz3.php'; alert('Budgeting Is Cool Quiz selected!')">📊 Budgeting Is Cool Quiz</button>
</div>

<script>
// Particle background
const particlesContainer = document.getElementById('particles-container');
for(let i=0;i<40;i++){
  const p=document.createElement('div');
  p.classList.add('particle');
  p.style.left=Math.random()*100+'%';
  p.style.top=Math.random()*100+'%';
  p.style.width=p.style.height=(Math.random()*4+2)+'px';
  p.style.animationDuration=(Math.random()*6+4)+'s';
  particlesContainer.appendChild(p);
}
</script>

</body>
</html>
