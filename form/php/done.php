<?php
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


$errors = [];
$data = [];


$required_fields = [
    "firstName", "lastName", "address1", "city_donor",
    "state_donor", "zipcode", "country", "phone", "email_donor",
    "donation_amount"
];
 if (empty($_POST["firstName"])) {
    $firstNameErr = "Name is required";
  } else {
    $firstName = test_input($_POST["firstName"]);
  }

foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        $errors[$field] = ucfirst($field) . " is required.";
    } else {
        $data[$field] = clean_input($_POST[$field]);
    }
}


$text_fields = ["firstName", "lastName", "company", "address1", "address2", "city_donor"];
foreach ($text_fields as $field) {
    if (!empty($_POST[$field])) {
        $value = clean_input($_POST[$field]);
        if (!preg_match("/^[a-zA-Z ]+$/", $value)) {
            $errors[$field] = ucfirst($field) . " must contain only letters and spaces.";
        } else {
            $data[$field] = $value;
        }
    }
}

$number_fields = ["zipcode", "phone", "otherAmount", "monthly", "months"];
foreach ($number_fields as $field) {
    if (!empty($_POST[$field])) {
        $value = clean_input($_POST[$field]);
        if (!preg_match("/^[0-9]+$/", $value)) {
            $errors[$field] = ucfirst($field) . " must contain only numbers.";
        } else {
            $data[$field] = $value;
        }
    }
}


if (!empty($_POST["email_donor"])) {
    $email = clean_input($_POST["email_donor"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email_donor"] = "Invalid email format.";
    } else {
        $data["email_donor"] = $email;
    }
}

if (isset($_POST["donation_amount"])) {
    $data["donation_amount"] = clean_input($_POST["donation_amount"]);
    if ($data["donation_amount"] === "other" && empty($_POST["otherAmount"])) {
        $errors["otherAmount"] = "Other amount is required if 'Other' is selected.";
    }
}

if (!empty($errors)) {
    echo "<h3 style='color:red;'>Validation Errors:</h3>";
    echo "<ul>";
    foreach ($errors as $err) {
        echo "<li>$err</li>";
    }
    echo "</ul>";
    echo "<a href='../form/donation.html'>Go Back</a>";
} else {
    echo "<h2 style='color:green;'>Form submitted successfully!</h2>";
    echo "<h3>Submitted Data:</h3><pre>";
    print_r($data);
    echo "</pre>";
}
?>
















}
?>
