<?php
session_start();
// Check for submit
if(isset($_POST['signup-submit'])){
    require 'dbh.inc.php';
    
    $username = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    // Check for empty fields in the register form
    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
        $_SESSION['message'] = "Please fill in all the mandatory fields!";
        $_SESSION['msg_type'] = "error";
        header("Location: ../signup.php?error=emptyfields");
        exit();
    }elseif(strlen($username) < 5){
        $_SESSION['message'] = "Your username must have at least 5 characters!";
        $_SESSION['msg_type'] = "error";
        header("Location: ../signup.php?error=userinvalid");
        exit();
    }
    // Check for a valid email address and a valid username
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $_SESSION['message'] = "Invalid username and email address!";
        $_SESSION['msg_type'] = "error";
        header("Location: ../signup.php?error=invalidemail&uid");
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['message'] = "Invalid email address! Please fill in a valid email addrress! ";
        $_SESSION['msg_type'] = "error";
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $_SESSION['message'] = "Invalid username! Please fill in a valid username!";
        $_SESSION['msg_type'] = "error";
        header("Location: ../signup.php?error=invalidusername");
        exit();
    }
    elseif(strlen($password) < 5) {
        $_SESSION['message'] = "Your password must have at least 5 characters";
        $_SESSION['msg_type'] = "error";
        header("Location: ../signup.php?error=passwordshort");
        exit();
    }
    elseif($password !== $passwordRepeat){
        $_SESSION['message'] = "The passwords do not match! Please try again!";
        $_SESSION['msg_type'] = "error";
        header("Location: ../signup.php?error=passwordcheck");
        exit();
    }
    else{
        $sql ="SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            $_SESSION['message'] = "SQL Error.Please contact the administrator for further assiatance!";
            $_SESSION['msg_type'] = "error";
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if(resultCheck > 0){
                $_SESSION['message'] = "Username already taken! Please create another username!";
                $_SESSION['msg_type'] = "error";
                header("Location: ../signup.php?error=usertaken");
                exit(); 
            }
            else{
                $sql = "INSERT INTO users (username, email, password) VALUES(?, ?, ?)";
                $_SESSION['message'] = "SQL Error.Please contact the administrator for further assiatance!";
                $_SESSION['msg_type'] = "error";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();  
                }
                else{
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
                    mysqli_stmt_execute($stmt);
                    $_SESSION['message'] = "Account succsesfully created! You may login using the same details!";
                    $_SESSION['msg_type'] = "success";
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysql_stmt_close($stmt);
    mysqli_close($conn);

}
else{
    header("Location: ../signup.php");
    exit(); 
}