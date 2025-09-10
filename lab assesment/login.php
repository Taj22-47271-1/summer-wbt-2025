<?php
session_start();
$msg = "";

// simple login demo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? "");
    $password = trim($_POST['password'] ?? "");
    if ($username === "Bob" && $password === "1234") {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $msg = "❌ Invalid username or password (try Bob / 1234).";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>xCompany – Login</title>
  <style>
    body{font-family:"Times New Roman",serif;margin:0}
    .frame{max-width:960px;margin:20px auto;border:2px solid #444;background:#fff}
    .bar{display:flex;justify-content:space-between;align-items:center;
         padding:10px 15px;border-bottom:2px solid #444}
    .brand .x{color:green;font-size:28px;font-weight:900}
    .brand .c{font-size:24px;font-weight:700}
    .footer{text-align:center;border-top:2px solid #444;padding:10px}
    .content{min-height:280px;padding:20px;border-bottom:2px solid #444;
             display:flex;align-items:center;justify-content:center}
    fieldset{border:1px solid #666;padding:15px;width:340px}
    legend{font-weight:bold}
    .form-table{width:100%}
    .form-table td{padding:6px 8px}
    input[type=text],input[type=password]{width:100%;padding:4px;border:1px solid #777}
    .remember{margin:6px 0}
    input[type=submit]{padding:5px 10px;margin-top:8px}
    .link{color:#3b157e;text-decoration:none;margin-left:10px}
    .link:hover{text-decoration:underline}
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
        <legend>LOGIN</legend>
        <?php if($msg): ?><div class="flash"><?= $msg ?></div><?php endif; ?>
        <table class="form-table">
          <tr>
            <td>User Name</td><td>:</td>
            <td><input type="text" name="username" required></td>
          </tr>
          <tr>
            <td>Password</td><td>:</td>
            <td><input type="password" name="password" required></td>
          </tr>
        </table>
        <div class="remember">
          <label><input type="checkbox" name="remember"> Remember Me</label>
        </div>
        <input type="submit" value="Submit">
        <a class="link" href="forgot.php">Forgot Password?</a>
      </fieldset>
    </form>
  </main>

  <!-- Footer -->
  <footer class="footer">Copyright © 2017</footer>
</div>
</body>
</html>
