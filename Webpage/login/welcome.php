<?php
include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome User</title>
<link rel="stylesheet" href="../css/basic.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #303641;
        }
    </style>
</head>
<body>
<div class="form">
<h1 >Welcome <?php echo $_SESSION['username']; ?>!</h1>
<p >This is secured index page</p>
<p><a href="dashboard.php">Your EMF dashboard</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>