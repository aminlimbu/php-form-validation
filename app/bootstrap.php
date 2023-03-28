<?php include('../app/views/header.php'); ?>
<?php
// initialise variables and array
$nameErr = $emailErr = $genderErr = $websiteErr = $fruitsErr = "";
$name = $email = $gender = $comment = $website = $fruits = "";
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate Name
  if (empty($_POST["name"])) {
    $errors["nameErr"] = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $errors["nameErr"] = "Only letters and white space allowed";
    }
  }

  // Validate email address
  if (empty($_POST["email"])) {
    $errors["emailErr"] = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors["emailErr"] = "Invalid email format";
    }
  }
  
  // Validate website address
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
    // sanitise input for security
    $comment = test_input($_POST["comment"]);
  }

  // Validate gender field
  if (empty($_POST["gender"])) {
    $errors["genderErr"] = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  // validate checkbox field
  if (empty($_POST["fruits"])) {
    $errors["fruitsErr"] = "Fruit is required";
  } else {
    foreach ($_POST['fruits'] as $selected) {
      $fruits = test_input($selected);
    }
  }
}

// Sanitise inputs and return
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
