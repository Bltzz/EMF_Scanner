<?php
require('db.php');
include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
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
<p>Dashboard</p>
<p>This is secured dashboard page</p>
<p><a href="welcome.php">Index</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>