<?php
    session_start();
if(isset($_POST['login-submit'])){
    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if(empty($mailuid) || empty($password)){
        $_SESSION['message'] = "Please fill in all the mandatory fields!";
        $_SESSION['msg_type'] = "error";
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else{
        $sql="SELECT * FROM users WHERE username=? OR email=?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            $_SESSION['message'] = "SQL Error.Please contact the administrator for further assistance!";
            $_SESSION['msg_type'] = "error";
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['password']);
                if($pwdCheck == false){
                    $_SESSION['message'] = "Wrong password! Please fill in the corect password!";
                    $_SESSION['msg_type'] = "error";
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
                elseif($pwdCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userName'] = $row['username'];
                    $_SESSION['message'] = "You are succsesfully loged in! Welcome!";
                    $_SESSION['msg_type'] = "success";
                    header("Location: ../landing.php?login=success");
                    exit();
                }else{
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
            }
            else{
                $_SESSION['message'] = "Username or email not found! Please proceed and register for an account";
                $_SESSION['msg_type'] = "error";
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }

}
else{
    header("Location: ../index.php");
    exit();
}