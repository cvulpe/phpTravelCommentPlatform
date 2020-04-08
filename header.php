<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pattaya&display=swap&subset=latin-ext" rel="stylesheet">
    <!-- <script src="https://kit.fontawesome.com/deacd0cdf3.js" crossorigin="anonymous"></script> -->
    <script src="https://kit.fontawesome.com/deacd0cdf3.js" crossorigin="anonymous"></script>
    <title>Login In</title>
</head>

<header class="main-head">
    <nav class="nav-header-main">
        <h3><a class="logo" href="#">Atlas</a></h3>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="landing.php">Portfolio</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>

        <div>
            <?php
                if(isset($_SESSION['userId'])){
                    echo' <form class="form-login" action="includes/logout.inc.php" method="POST">
                    <button type="submit" name="logout-submit" id="log">Logout</button>
                </form>';
                }
                else{
                    echo'<form class="form-login" action="includes/login.inc.php" method="POST">
                    <input class="uid-wrp" type="text" name="mailuid" placeholder="Username/E-mail: " value="">
                    <input class="pwd-wrp" type="password" name="pwd" placeholder="Password:" value="">
                    <button type="submit" name="login-submit" id="log">Login</button>
                </form>
                <a href="index.php">Signup for an account</a>';
                }
            ?>
        </div>
    </nav>
</header>
<?php if (isset($_SESSION['message'])): ?>
<div class="alert-<?=$_SESSION['msg_type']?>">
    <?php
        
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
</div>
<?php endif; ?>

<body>