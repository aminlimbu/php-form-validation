<?php include('../app/views/header.php'); ?>
<?php
$nameErr = $emailErr = $genderErr = $websiteErr = $fruitsErr = "";
$name = $email = $gender = $comment = $website = $fruits = "";
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $errors["nameErr"] = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $errors["nameErr"] = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $errors["emailErr"] = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors["emailErr"] = "Invalid email format";
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
      $errors["websiteErr"] = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $errors["genderErr"] = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["fruits"])) {
    $errors["fruitsErr"] = "Fruit is required";
  } else {
    foreach ($_POST['fruits'] as $selected) {
      $fruits = test_input($selected);
    }
  }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php include("../app/views/Form.php") ?>
<?php include('../app/views/footer.php'); ?>