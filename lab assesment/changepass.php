<?php
session_start();
$_SESSION['username'] = $_SESSION['username'] ?? "Bob";

$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current = $_POST['current'] ?? "";
    $new     = $_POST['new'] ?? "";
    $retype  = $_POST['retype'] ?? "";

    if ($new !== $retype) {
        $msg = "❌ New Password and Retype Password do not match.";
    } elseif ($new === "" || $current === "") {
        $msg = "❌ All fields are required.";
    } else {
        // In real app: verify $current with DB and then update password.
        $msg = "✅ Password changed successfully (demo).";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>xCompany – Change Password</title>
  <style>
    body{font-family:"Times New Roman",serif;margin:0}
    .frame{max-width:960px;margin:20px auto;border:2px solid #444;background:#fff}
    .bar{display:flex;justify-content:space-between;align-items:center;
         padding:10px 15px;border-bottom:2px solid #444}
    .brand .x{color:green;font-size:28px;font-weight:900}
    .brand .c{font-size:24px;font-weight:700}
    .footer{text-align:center;border-top:2px solid #444;padding:10px}
    .content{display:flex;min-height:300px;padding:0;border-bottom:2px solid #444}
    .sidebar{width:240px;border-right:2px solid #444;padding:16px}
    .sidebar h3{margin:0 0 6px;font-weight:700}
    .sidebar ul{list-style:disc;margin:8px 0 0 20px;padding:0}
    .sidebar li{margin-bottom:6px}
    .sidebar a{color:#3b157e;text-decoration:none}
    .sidebar a:hover{text-decoration:underline}
    .mainarea{flex:1;padding:20px}
    fieldset{border:1px solid #666;padding:14px}
    legend{font-weight:700}
    .form-table{width:100%}
    .form-table td{padding:6px 10px;vertical-align:middle}
    input[type=password]{width:100%;padding:4px;border:1px solid #777}
    input[type=submit]{padding:5px 12px;margin-top:10px}
    .green{color:green}
    .red{color:red}
    .flash{margin:8px 0;padding:8px;border:1px solid #aaa;background:#f9f9f9}
  </style>
</head>
<body>
<div class="frame">
  <!-- Header -->
  <header class="bar">
    <div class="brand"><span class="x">X</span><span class="c">Company</span></div>
    <div>Logged in as <a href="#"><?= htmlspecialchars($_SESSION['username']) ?></a> | <a href="logout.php">Logout</a></div>
  </header>

  <!-- Content -->
  <main class="content">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h3>Account</h3><hr>
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="view_profile.php">View Profile</a></li>
        <li><a href="edit_profile.php">Edit Profile</a></li>
        <li><a href="change_picture.php">Change Profile Picture</a></li>
        <li><a href="change_password.php">Change Password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </aside>

    <!-- Form -->
    <section class="mainarea">
      <form method="post">
        <fieldset>
          <legend>CHANGE PASSWORD</legend>
          <?php if($msg): ?><div class="flash"><?= $msg ?></div><?php endif; ?>
          <table class="form-table">
            <tr>
              <td>Current Password</td><td>:</td>
              <td><input type="password" name="current" required></td>
            </tr>
            <tr>
              <td class="green">New Password</td><td>:</td>
              <td><input type="password" name="new" required></td>
            </tr>
            <tr>
              <td class="red">Retype New Password</td><td>:</td>
              <td><input type="password" name="retype" required></td>
            </tr>
          </table>
          <hr>
          <input type="submit" value="Submit">
        </fieldset>
      </form>
    </section>
  </main>

  <!-- Footer -->
  <footer class="footer">Copyright © 2017</footer>
</div>
</body>
</html>
