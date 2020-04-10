<?php

function setComments($conn){
    if(isset($_POST['commentSubmit'])){
        $uid = $_SESSION['uid'];
        $date = $_POST['date'];
        $articleId = $_POST['articleId'];
        $message = $_POST['message'];
       

        $sql = "INSERT INTO comments (uid, date, message, articleId) VALUES ('$uid', '$date', '$message', '$articleId')";
        $result = $conn->query($sql);
    }
}

function getComments($conn){
    $articleId = $_POST['articleId'];
    $sql = "SELECT * FROM comments WHERE articleId='$articleId'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $id = $row['uid'];
        $sql2 = "SELECT * FROM users WHERE id='$id'";
        $result2 = $conn ->query($sql2);
        if($row2 = $result2-> fetch_assoc()){
            echo"<div class='comment-box'><p>";
                echo $row2['uid']."<br>";
                echo $row['date']."<br>";
                echo nl2br($row['message']);
                echo"</p>";
                if(isset($_SESSION['id'])){
                    if($_SESSION['id'] == $row2['id']){
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

function deleteComments($conn){

}

function editComments($conn){
    
}