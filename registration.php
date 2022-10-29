<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['name'])) {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
		$confirm_password = $_REQUEST['confirm_password'];
		
		$select = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'" );
		if(mysqli_num_rows($select)) {
			echo "<div class='form'>
				<h3>This is email has been used... please try another one</h3><br/>
				<p class='link'>Click here to <a href='registration.php'>registration</a></p>
				</div>";
		} else {
			$query = mysqli_query($con,"INSERT into user (name, password, email)
			VALUES ('$name', '$password', '$email')");
			echo "<div class='form'>
				<h3>You are registered successfully.</h3><br/>
				<p class='link'>Click here to <a href='login.php'>Login</a></p>
				</div>";
        } 
    } else {
?>
    <form id="form" class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" id="name" placeholder="name"  required>
        <input type="text" class="login-input" name="email" id="email" placeholder="Email Adress" required>
        <input type="password" class="login-input" name="password" id="password" placeholder="Password" required>
		<input type="password" class="login-input" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>