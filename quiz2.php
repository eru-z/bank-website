<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>How Banks Work Quiz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('https://img.freepik.com/premium-vector/black-yellow-gradient-color-abstract-background-wallpaper-design_1259814-571.jpg?semt=ais_hybrid&w=740'); 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      color: #333;
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      margin-top: 60px;
      padding: 0 15px;
    }

    .row {
      display: flex;
      justify-content: center;
    }

    .col-md-8 {
      max-width: 800px;
      width: 100%;
    }

    .text-center {
      text-align: center;
    }

    .mb-4 {
      margin-bottom: 1.5rem;
    }

    h1 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #FFD600; /* Raiffeisen red */
    }

    p {
      font-size: 1.1rem;
      color: rgb(117, 117, 117);
    }

    .progress {
      background-color: rgba(40, 40, 40, 0.44);;
      border-radius: 6px;
      height: 12px;
      margin-bottom: 1.5rem;
    }

    .progress-bar {
      background-color: #FFD600; /* Raiffeisen red */
      height: 100%;
      border-radius: 6px;
      transition: width 0.3s ease;
    }

    .quiz-card {
      background-color: #1a1a1a; /* Dark gray card background for a professional feel */
      border: none;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      border-radius: 16px;
      padding: 30px;
      color: #fff;
    }

    .quiz-card h1 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #FFD600; /* Raiffeisen red */
    }

    .quiz-card p {
      font-size: 1.1rem;
      color: #ccc;
    }

    .btn-option {
      width: 100%;
      margin-bottom: 15px;
      padding: 14px 20px;
      font-size: 1rem;
      border: 1px solid #ddd;
      border-radius: 12px;
      background-color: #000;
      transition: all 0.2s;
      color: #fff;
    }

    .btn-option:hover {
      background-color:rgba(26, 26, 26, 0.76);
      border-color: #FFD600;
      color: #FFD600;
    }

    .btn-dark {
      background-color: #FFD600; /* Raiffeisen red */
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 10px;
      font-size: 1rem;
      transition: background-color 0.2s ease;
    }

    .btn-dark:hover {
      background-color: #FFD600; /* Darker Raiffeisen red */
    }

    .alert {
  border-radius: 12px;
  padding: 6px 12px; /* reduced vertical padding */
  font-size: 1rem;
}


    .alert-success {
      background-color: rgba(0, 0, 0, 0.61);
      border: 0.5px solid white;
      color: #2d7a2d;
    }

    .alert-danger {
      background-color:rgba(55, 55, 55, 0.15);
      border: 0.5px solid rgba(255, 255, 255, 0.61);
      color: #992d2d;
    }

    .footer {
      text-align: center;
      margin-top: 50px;
      font-size: 0.9rem;
      color: #777;
    }
  </style>


<body>

<!-- Back to Dashboard Button -->
<div class="position-absolute" style="top: 30px; right: 30px;">
  <a href="lessons.php" class="btn btn-dark">← Back to Lessons</a>
</div>


  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="text-center mb-4">
          <h1 class="fw-bold">How Banks Work Quiz</h1>
          <p class="lead">Test your knowledge about how banks operate!</p>
        </div>

        <div class="progress mb-4">
          <div class="progress-bar" role="progressbar" style="width: 0%" id="progress-bar"></div>
        </div>

        <div class="card quiz-card" id="quiz-card">
          <form id="quiz-form">
            <div id="question-container"></div>
            <div id="options-container"></div>
            <input type="hidden" id="current" value="0">
            <input type="hidden" id="score" value="0">
          </form>
          <div id="feedback"></div>
        </div>
      </div>
    </div>
  </div>
  <script>
  // Questions Array
  const questions = [
  {
    question: 'What is the difference between a debit card and a credit card?',
    options: [
      'A debit card uses money from your bank account, while a credit card borrows money that must be paid back.',
      'A credit card uses money from your bank account, while a debit card borrows money.',
      'Both cards are used to borrow money.',
      'Debit cards are for online purchases only.'
    ],
    answer: 0
  },
  {
    question: 'What is the FDIC?',
    options: [
      'Federal Deposit Insurance Corporation – insures deposits in U.S. banks.',
      'Federal Debt Interest Commission – regulates interest rates.',
      'Financial Direct Investment Control – monitors investment trends.',
      'Federal Debt Insurance Corporation – insures personal loans.'
    ],
    answer: 0
  },
  {
    question: 'What is a bank loan typically used for?',
    options: [
      'To purchase goods from the bank.',
      'To invest in personal or business ventures.',
      'To pay back money you owe to the bank.',
      'To pay fees to open a bank account.'
    ],
    answer: 1
  },
  {
    question: 'How do banks ensure the safety of your money?',
    options: [
      'By offering insurance on accounts like savings and checking accounts.',
      'By keeping a portion of your money in a vault.',
      'By limiting withdrawals.',
      'All of the above.'
    ],
    answer: 3
  },
  {
    question: 'What is the purpose of a bank’s loan underwriting process?',
    options: [
      'To approve loans without any conditions.',
      'To assess the creditworthiness and risk of the borrower.',
      'To set the interest rates for loans.',
      'To determine the types of bank accounts to offer.'
    ],
    answer: 1
  },
  {
    question: 'What is an ATM?',
    options: [
      'An Automated Transaction Machine for withdrawing and depositing money.',
      'A machine for issuing loans to customers.',
      'A system for transferring money between banks.',
      'A type of bank account for individuals.'
    ],
    answer: 0
  },
  {
    question: 'What is the role of interest in a bank loan?',
    options: [
      'Interest is the amount of money the bank pays you for depositing funds.',
      'Interest is the charge applied to a loan for borrowing money.',
      'Interest is paid to employees of the bank.',
      'Interest is paid to other banks for using their services.'
    ],
    answer: 1
  },
  {
    question: 'What is the purpose of a bank’s credit rating?',
    options: [
      'To determine how much money a bank should lend to a customer.',
      'To evaluate the bank’s risk of defaulting on loans.',
      'To assess the bank’s ability to pay dividends to shareholders.',
      'To determine the bank’s ability to accept new deposits.'
    ],
    answer: 1
  },
  {
    question: 'What is the main difference between a bank’s savings account and its investment services?',
    options: [
      'Savings accounts provide interest, while investments are used to earn higher returns with higher risk.',
      'Savings accounts are for storing money, and investment services are for spending money.',
      'There is no difference. Both serve the same function.',
      'Investment services provide insurance, while savings accounts do not.'
    ],
    answer: 0
  },
  {
    question: 'What is the purpose of a bank’s branch?',
    options: [
      'To offer customers face-to-face services such as withdrawals, deposits, and advice.',
      'To store large amounts of money.',
      'To process online banking transactions.',
      'To invest customer funds in the stock market.'
    ],
    answer: 0
  }
  
];



  let current = parseInt(localStorage.getItem('current')) || 0;
  let score = parseInt(localStorage.getItem('score')) || 0;

  // Load the next question
  function loadQuestion() {
    const question = questions[current];
    const questionContainer = document.getElementById('question-container');
    const progressBar = document.getElementById('progress-bar');
    const feedback = document.getElementById('feedback');
    
    // Update progress bar
    progressBar.style.width = `${(current / questions.length) * 100}%`;

    if (current >= questions.length) {
      // Show result when quiz is finished
      const result = score === questions.length 
        ? "You're a Budgeting Boss! 🧠" 
        : score >= 2 
        ? "Nice try! Keep improving 💪" 
        : "Let’s keep learning! 📘";

      questionContainer.innerHTML = `
        <h3>🎉 You scored ${score} out of ${questions.length}!</h3>
        <p>${result}</p>
        <button class="btn btn-dark mt-3" onclick="restartQuiz()">Retry Quiz</button>
      `;
      feedback.innerHTML = '';
    } else {
      // Display the current question
      questionContainer.innerHTML = `
        <h4>${question.question}</h4>
        ${question.options.map((option, index) => `
          <button type="button" class="btn btn-outline-dark btn-option" onclick="submitAnswer(${index})">${option}</button>
        `).join('')}
      `;
    }
  }

  // Submit an answer
  function submitAnswer(selectedIndex) {
    const question = questions[current];
    const feedback = document.getElementById('feedback');
    const currentScore = parseInt(document.getElementById('score').value);

    // Check if the answer is correct
    if (selectedIndex === question.answer) {
      score++;
      feedback.innerHTML = '<div class="alert alert-success mt-3">✅ Correct!</div>';
    } else {
      const correct = question.options[question.answer];
      feedback.innerHTML = `<div class="alert alert-danger mt-3">❌ Not quite. Correct answer: <strong>${correct}</strong></div>`;
    }

    // Update the progress
    current++;
    localStorage.setItem('current', current);
    localStorage.setItem('score', score);

    // Reload the next question
    loadQuestion();
  }

  // Restart quiz
  function restartQuiz() {
    localStorage.removeItem('current');
    localStorage.removeItem('score');
    window.location.reload();
  }

  // Initialize the quiz
  loadQuestion();
</script>

</body>
</html>