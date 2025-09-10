<?php
session_start();

// mock login name for the header (use your real auth later)
$_SESSION['username'] = $_SESSION['username'] ?? "Bob";

// current picture path kept in session (fallback to placeholder)
$placeholder = "https://cdn-icons-png.flaticon.com/512/847/847969.png";
if (!isset($_SESSION['profile_pic'])) $_SESSION['profile_pic'] = $placeholder;

// handle upload
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg','jpeg','png','gif'];
        $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed)) {
            $msg = "Only JPG, PNG, or GIF allowed.";
        } else {
            // ensure uploads dir exists and is writable
            $dir = __DIR__ . "/uploads";
            if (!is_dir($dir)) mkdir($dir, 0777, true);
            $safeName = "pp_" . time() . "_" . preg_replace('/[^a-z0-9._-]/i','', $_FILES['photo']['name']);
            $destFs   = $dir . "/" . $safeName;            // filesystem path
            $destWeb  = "uploads/" . $safeName;            // web path for <img src>

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $destFs)) {
                $_SESSION['profile_pic'] = $destWeb;
                $msg = "Profile picture updated.";
            } else {
                $msg = "Failed to save file. Check folder permissions.";
            }
        }
    } else {
        $msg = "Upload error (code: ".$_FILES['photo']['error'].").";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>xCompany – Change Profile Picture</title>
  <style>
    /* Frame + header/footer */
    body{font-family:"Times New Roman",serif;margin:0}
    .frame{max-width:960px;margin:20px auto;border:2px solid #444;background:#fff}
    .bar{display:flex;justify-content:space-between;align-items:center;
         padding:10px 15px;border-bottom:2px solid #444}
    .brand .x{color:green;font-size:28px;font-weight:900}
    .brand .c{font-size:24px;font-weight:700}
    .footer{text-align:center;border-top:2px solid #444;padding:10px}
    /* Two-column layout */
    .content{display:flex;min-height:320px;padding:0;border-bottom:2px solid #444}
    .sidebar{width:240px;border-right:2px solid #444;padding:16px}
    .sidebar h3{margin:0 0 6px;font-weight:700}
    .sidebar ul{list-style:disc;margin:8px 0 0 20px;padding:0}
    .sidebar li{margin-bottom:6px}
    .sidebar a{color:#3b157e;text-decoration:none}
    .sidebar a:hover{text-decoration:underline}
    .mainarea{flex:1;padding:20px}
    /* Card box */
    fieldset{border:1px solid #666;padding:14px}
    legend{font-weight:700}
    .pic-box{max-width:420px}
    .preview{width:160px;height:160px;border:1px solid #999;object-fit:cover;display:block;margin-bottom:10px}
    .line{border:0;border-top:1px solid #cfcfcf;margin:12px 0}
    .flash{margin:8px 0;padding:8px 10px;border:1px solid #aaa;background:#f7f7f7}
    input[type="file"]{margin:6px 0}
    input[type="submit"]{padding:5px 10px}
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
    <!-- Left menu -->
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

    <!-- Right panel -->
    <section class="mainarea">
      <form class="pic-box" method="post" enctype="multipart/form-data">
        <fieldset>
          <legend>PROFILE PICTURE</legend>

          <?php if ($msg): ?><div class="flash"><?= $msg ?></div><?php endif; ?>

          <img class="preview" src="<?= htmlspecialchars($_SESSION['profile_pic']) ?>" alt="Profile Picture">
          <input type="file" name="photo" accept="image/*" required>
          <hr class="line">
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
