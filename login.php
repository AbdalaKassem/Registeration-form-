<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = $_REQUEST['email'];    
        $password = $_REQUEST['password'];
        // Check user is exist in the database
        $query    = "SELECT * FROM user WHERE email='$email'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if ($rows == 1) {
			$temp = mysqli_fetch_array($result);
			$name = $temp['name'];
            $_SESSION['name'] = $name;
            // Redirect to user dashboard page
            header("Location: welcome.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect name/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="email" placeholder="email" autofocus="true" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>