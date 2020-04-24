<?php

// Set a comment

function setComments($conn){
    if(isset($_POST['commentSubmit'])){
        $uid = $_SESSION['uid'];
        $date = $_POST['date'];
        $articleId = $_SESSION['articleId'];
        $message = $_POST['message'];
       
        $sql = "INSERT INTO comments (uid, date, message, articleId) VALUES ('$uid', '$date', '$message', '$articleId')";
        $result = $conn->query($sql);
    }
}

// Retrive comments

function getComments($conn){
    $articleId = $_SESSION['articleId']; 
    $sql = "SELECT * FROM comments WHERE articleId='$articleId'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $id = $row['uid'];
        $sql2 = "SELECT * FROM users WHERE uid='$id'";
        $result2 = $conn ->query($sql2);
        if($row2 = $result2-> fetch_assoc()){
            echo"<div class='comment-box'><p>";
                echo $row2['username']."<br>";
                echo $row['date']."<br>";
                echo nl2br($row['message']);
                echo"</p>";
                if(isset($_SESSION['uid'])){
                    if($_SESSION['uid'] == $row2['uid']){
                        echo"<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
                            <input type='hidden' name='cid' value='".$row['cid']."'>
                            <button name='commentDelete' type='submit' >Delete</button>
                        </form>
                        <form class='edit-form' method='POST' action='editComment.php'>
                            <input type='hidden' name='cid' value='".$row['cid']."'>
                            <input type='hidden' name='uid' value='".$row['uid']."'>
                            <input type='hidden' name='date' value='".$row['date']."'>
                            <input type='hidden' name='message' value='".$row['message']."'>
                            <button>Edit</button>
                        </form>";
                    }else{
                        echo"<form class='edit-form' method='POST' action='".deleteComments($conn)."'>
                            <input type='hidden' name='cid' value='".$row['cid']."'>
                            <button name='commentDelete' type='submit' >Reply</button>
                        </form>";
                    }

                }else{
                    echo"<p class='comment-msg'>You need to login in to reply!</p>";
                }

            echo"</div>";
        }
        
    }
   
}

// Edit a comment

function editComments($conn){
    if(isset($_POST['commentSubmit'])){
        $cid = $_POST['cid'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $articleId = $_SESSION['articleId'];     
                
        $sql = "UPDATE comments SET message ='$message' WHERE cid='$cid'";
        $result = $conn->query($sql);
        if($articleId === 1){
            header("Location: btower.php");
        }elseif($articleId === 2){
            header("Location: bCastle.php");
        }elseif($articleId === 3){
            header("Location: iPalace.php");
        }
            else{
            header("Location: landing.php");
        }
        
    }
}

//Delete a comment

function deleteComments($conn){
    if(isset($_POST['commentDelete'])){
        $cid = $_POST['cid'];
        
        $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("Location: landing.php");
    }
}