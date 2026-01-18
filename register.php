<?php
session_start();
require_once 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    // Hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        die("Error: " . $stmt->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Raiffeisen Bank - Register</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<style>
/* Reset */
*{margin:0;padding:0;box-sizing:border-box;font-family:'Roboto',sans-serif;}
body, html{height:100%;overflow:hidden;display:flex;justify-content:center;align-items:center;background:#0a0a0a;}

/* Particles */
.particle{position:absolute;width:6px;height:6px;background:#ffd700;border-radius:50%;opacity:0.7;animation:float 10s linear infinite;}
@keyframes float{0%{transform:translateY(0) translateX(0);}50%{transform:translateY(-80px) translateX(20px);}100%{transform:translateY(0) translateX(0);}}

/* Container */
.container{position:relative;width:400px;max-width:90%;}

/* Glassmorphic Form */
.form-bg{
  background: rgba(0,0,0,0.65);
  backdrop-filter: blur(15px);
  padding: 1rem 3rem 3rem;
  border-radius: 20px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.6);
  display:flex;
  flex-direction:column;
  gap:1rem;
  opacity:0;
  transform:translateY(30px);
  animation:fadeIn 1s forwards;
}

/* Logo Circle */
.logo-circle{
  position:absolute;
  top:-100px;
  left:35%;
  transform:translateX(-50%);
  width:100px;height:100px;
  border-radius:50%;
  background:#fff;
  display:flex;justify-content:center;align-items:center;
  box-shadow:0 6px 20px rgba(0,0,0,0.3);
  animation:fadeInDown 1s forwards;
}
.logo-circle img{width:100%;height:100%;object-fit:contain;}

/* Input Groups */
.input-group{
  display:flex;align-items:center;padding:18px;border-radius:10px;border:1px solid #ffd700;
  transition:all 0.3s;backdrop-filter:blur(5px);background:rgba(255,255,255,0.05);
  margin-bottom:20px;
}
.input-group i{margin-right:10px;color:#ffd700;}
.input-group input{
  background:transparent;border:none;outline:none;color:#fff;width:100%;
  font-size:14px;transition:all 0.3s;
}
.input-group input:focus{box-shadow:0 0 10px #ffd700;}

/* Register Button */
.login-btn{
  background:#ffd700;color:#000;font-weight:700;padding:12px;border-radius:50px;
  border:none;cursor:pointer;width:100%;font-size:14px;letter-spacing:1px;
  box-shadow:0 0 20px #ffd700,0 0 40px #fff;
  transition:all 0.3s;
}
.login-btn:hover{transform:scale(1.05);box-shadow:0 0 35px #ffd700,0 0 60px #fff;}

/* Register text */
.register-text{text-align:center;font-size:12px;color:#fff;margin-top:10px;}
.register-text a{color:#ffd700;font-weight:bold;}
.register-text a:hover{text-decoration:underline;}

/* Error message */
.error-message{
  color:#ff4b5c;
  font-weight:bold;
  text-align:center;
  animation:shake 0.5s;
}

/* Animations */
@keyframes fadeIn{to{opacity:1;transform:translateY(0);}}
@keyframes fadeInDown{0%{opacity:0;transform:translateY(-30px);}100%{opacity:1;transform:translateY(0);}}
@keyframes shake{0%{transform:translateX(0);}25%{transform:translateX(-5px);}50%{transform:translateX(5px);}75%{transform:translateX(-5px);}100%{transform:translateX(0);}}
</style>
</head>
<body>

<div id="particles-container"></div>

<div class="container">
  <div class="logo-circle">
    <img src="logo.png" alt="Raiffeisen Logo" />
  </div>

  <div class="form-bg">
    <?php if (isset($error)): ?>
      <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="input-group"><i class="fas fa-user"></i><input type="text" name="username" placeholder="Username" required /></div>
      <div class="input-group"><i class="fas fa-envelope"></i><input type="email" name="email" placeholder="Email" required /></div>
      <div class="input-group"><i class="fas fa-lock"></i><input type="password" name="password" placeholder="Password" required /></div>
      <div class="input-group"><i class="fas fa-lock"></i><input type="password" name="confirm_password" placeholder="Confirm Password" required /></div>
      <button type="submit" class="login-btn">REGISTER</button>
      <p class="register-text">Already have an account? <a href="login.php">Login here</a></p>
    </form>
  </div>
</div>

<script>
// Particle background
const particlesContainer = document.getElementById('particles-container');
for(let i=0;i<40;i++){
  const p = document.createElement('div');
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
