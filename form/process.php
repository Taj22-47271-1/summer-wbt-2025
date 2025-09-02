<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_no = $_POST['roll_no'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $father_name = $_POST['father_name'];
    $dob = $_POST['day'] . "-" . $_POST['month'] . "-" . $_POST['year'];
    $mobile = $_POST['country_code'] . $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $departments = isset($_POST['department']) ? implode(", ", $_POST['department']) : '';
    $course = $_POST['course'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    // Handle file upload
    $photo = "";
    if (isset($_FILES["student_photo"]) && $_FILES["student_photo"]["error"] == 0) {
        $photo = "uploads/" . basename($_FILES["student_photo"]["name"]);
        move_uploaded_file($_FILES["student_photo"]["tmp_name"], $photo);
    }

    echo "<h1>Registration Successful</h1>";
    echo "<p><b>Roll No:</b> $roll_no</p>";
    echo "<p><b>Name:</b> $first_name $last_name</p>";
    echo "<p><b>Father's Name:</b> $father_name</p>";
    echo "<p><b>Date of Birth:</b> $dob</p>";
    echo "<p><b>Mobile:</b> $mobile</p>";
    echo "<p><b>Email:</b> $email</p>";
    echo "<p><b>Gender:</b> $gender</p>";
    echo "<p><b>Department:</b> $departments</p>";
    echo "<p><b>Course:</b> $course</p>";
    echo "<p><b>City:</b> $city</p>";
    echo "<p><b>Address:</b> $address</p>";
    if ($photo) {
        echo "<p><b>Photo:</b><br><img src='$photo' width='150'></p>";
    }
}
?>
