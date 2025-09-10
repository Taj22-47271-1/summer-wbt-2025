<?php
session_start();
$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? "");
    if ($email === "") {
        $msg = "❌ Please enter your email.";
    } else {
        // In real app you would check DB and send reset email
        $msg = "✅ If an account exists for " . htmlspecialchars($email) . ", a reset link has been sent.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>xCompany – Forgot Password</title>
  <style>
    body{font-family:"Times New Roman",serif;margin:0}
    .frame{max-width:960px;margin:20px auto;border:2px solid #444;background:#fff}
    .bar{display:flex;justify-content:space-between;align-items:center;
         padding:10px 15px;border-bottom:2px solid #444}
    .brand .x{color:green;font-size:28px;font-weight:900}
    .brand .c{font-size:24px;font-weight:700}
    .footer{text-align:center;border-top:2px solid #444;padding:10px}
    .content{min-height:300px;padding:20px;border-bottom:2px solid #444;
             display:flex;justify-content:center;align-items:center}
    fieldset{border:1px solid #666;padding:14px;width:380px}
    legend{font-weight:700}
    .form-table{width:100%}
    .form-table td{padding:6px 8px}
    input[type=email]{width:100%;padding:4px;border:1px solid #777}
    input[type=submit]{padding:5px 12px;margin-top:10px}
    .flash{margin:8px 0;padding:8px;border:1px solid #aaa;background:#f9f9f9}
    .nav a{color:#3b157e;text-decoration:none;margin:0 4px}
    .nav a:hover{text-decoration:underline}
  </style>
</head>
<body>
<div class="frame">
  <!-- Header -->
  <header class="bar">
    <div class="brand"><span class="x">X</span><span class="c">Company</span></div>
    <div class="nav">
      <a href="index.php">Home</a> |
      <a href="login.php">Login</a> |
      <a href="registration.php">Registration</a>
    </div>
  </header>

  <!-- Content -->
  <main class="content">
    <form method="post">
      <fieldset>
        <legend>FORGOT PASSWORD</legend>
        <?php if($msg): ?><div class="flash"><?= $msg ?></div><?php endif; ?>
        <table class="form-table">
          <tr>
            <td>Enter Email</td><td>:</td>
            <td><input type="email" name="email" required></td>
          </tr>
        </table>
        <hr>
        <input type="submit" value="Submit">
      </fieldset>
    </form>
  </main>

  <!-- Footer -->
  <footer class="footer">Copyright © 2017</footer>
</div>
</body>
</html>
