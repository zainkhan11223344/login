<?php
session_start();
require_once("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $mysqli->real_escape_string($_POST["username"]);
    $password = $mysqli->real_escape_string($_POST["password"]);

    $query = "SELECT user FROM vicidial_users WHERE user='$username' AND pass='$password'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows == 1) {
        $_SESSION["loggedin"] = true;
        header("Location: http://your-ip/");  // replace your-ip
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Validation</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Kanit:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="container" id="container">
       
        <form method="post">
            <div class="h1"><h1>Firewall Login</h1></div>
            <div class="inputBx">
                   Username: <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="inputBx">
                      Password: <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="Button">
                        <input type="submit" value="Login" name="submit">
                    </div>
        <div class="toggle-container">
            <div class="toggle">
 
                <div class="toggle-panel toggle-right">
                    <h1 class="typing">Welcome User !</h1>
                    <p>Please enter your valid credentials.</p>
                    
                </div>
            </div>
        </div>
    </div>

      <div class="signup_link">
      </div>
    </form>
  </div>
</body>
</html>
