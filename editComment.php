<?php
    require "header.php";
    date_default_timezone_set('Europe/Bucharest');
    include 'includes/dbh.inc.php';
    include 'includes/comments.inc.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit comment</title>
</head>

<body>
    <?php
    
    $articlePage = $_SESSION['articlePage'];
    $cid = $_POST['cid'];
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = $_POST['message'];
        echo'<form method="POST" action="'.editComments($conn).'">
        <input type="hidden" name="cid" value="'.$cid.'">
        <input type="hidden" name="uid" value="'.$uid.'">
        <input type="hidden" name="date" value="'.$date.'">
            <textarea name="message" id="" cols="30" rows="10">'.$message.'</textarea><br>
            <button type="submit" name="commentSubmit">Edit</button>
        </form>';

        require "footer.php";
    ?>

</body>

</html>