<?php
    require "header.php";
    require "includes/comments.inc.php";
    require "includes/dbh.inc.php";
    date_default_timezone_set('Europe/Bucharest');
     if(isset($_SESSION['userId'])){
?>

<main>
    <div class="wrapper">
        <section class="hero-section">
            <div class="hero-description">
                <hgroup class="hero-head">
                    <h2>The Ultimate Broadway Tower Experiance </h2>
                    <h4>Broadways best loved lifestyle destination.</h4>
                </hgroup>
                <div class="hero-text">
                    <p>Broadway Tower & Park is a family-owned Cotswold destination set within a 50-acre estate of
                        parkland,
                        allowing visitors to experience great English heritage in an inspiring location. Your ticket
                        includes all you need for a memorable day – Tower Museum with roof platform, the Deer Park or
                        walking the grounds with your picnic. Don't forget your boots during a raining season since the
                        grounds can be quite muddy.
                    </p>
                    <p>Enjoy a circular walk around the majestic tower or rent a bike, and check the Tower Barn the deer
                        park and even the historic nuclear bunker with a vast importance during the World war II. Get
                        your ticket now,
                        and obtain up to 20% discount for family trips or groups larger than 5 persons.
                    </p>
                    <button type="submit" name="claimOffer" id="claim">Get it now!</button>
                </div>
            </div>
            <div class="hero-img">
                <img src="img/broadwayTowerUK.png" alt="">
            </div>
        </section>
    </div>
    <section class="comment-section">
        <?php 
       echo'
        <form class="form-comment" name="comment" method="POST" action="'.setComments($conn).'">
            <input type="hidden" name="uid" value="'.$_SESSION['userId'].'">
            <input type="hidden" name="date" value="'.date('Y-m-d H:i:s').'">
            <input type="hidden" name="articleId" value="1">
            <textarea name="message" id="textarea" placeholder="Leave us a comment"></textarea><br>
        
        <div>
            <button class="comment-btn" type="submit" name="commentSubmit">Comment</button>
        </div>
        </form>
    ';
    ?>
    </section>
    </div>
</main>
<?php
  require "footer.php";

}else{
    $_SESSION['message'] = "Please login in order to check the articles";
    $_SESSION['msg_type'] = "login";
    header("Location: landing.php?error=login");
    exit();
    }
    getComments($conn);
?>