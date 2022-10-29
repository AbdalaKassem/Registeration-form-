<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Welcome, <?php echo $_SESSION['name']; ?>!</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>