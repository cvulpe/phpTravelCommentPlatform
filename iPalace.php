<?php
    require "header.php";
    require "includes/comments.inc.php";
    require "includes/dbh.inc.php";
    date_default_timezone_set('Europe/Bucharest');
     if(isset($_SESSION['uid'])){
?>
<main>
    <div class="wrapper">
        <section class="hero-section">
            <div class="hero-description">
                <hgroup class="hero-head">
                    <h2>The Tokyo Imperial Palace</h2>
                    <h4>Kōkyo, Imperial Residence</h4>
                </hgroup>
                <div class="hero-text">
                    <p>The Tokyo Imperial Palace (皇居, Kōkyo, literally 'Imperial Residence') is the primary residence of
                        the Emperor of Japan. It is a large park-like area located in the Chiyoda ward of Tokyo and
                        contains buildings including the main palace (宮殿, Kyūden), the private residences of the
                        Imperial Family, an archive, museums and administrative offices.
                    </p>
                    <p>It is built on the site of the old Edo Castle. The total area including the gardens is 1.15
                        square kilometres (0.44 sq mi). During the height of the 1980s Japanese property bubble, the
                        palace grounds were valued by some to be more than the value of all of the real estate in the
                        state of California.
                    </p>
                    <button type="submit" name="claimOffer" id="claim">Get it now!</button>
                </div>
            </div>
            <div class="hero-img">
                <img src="img/imperialPalace.jpg" alt="">
            </div>
        </section>
    </div>

    <section class="comment-section">
        <?php 
        $articleId = $_POST['articleId'] = 3;
        $articlePage = $_GET['page'] = "iPalace";
       echo'
        <form class="form-comment" name="comment" method="POST" action="'.setComments($conn).'">
            <input type="hidden" name="uid" value="'.$_SESSION['uid'].'">
            <input type="hidden" name="date" value="'.date('Y-m-d H:i:s').'">
            <input type="hidden" name="articleId" value="3">
            <input type="hidden" name="page">
            <textarea name="message" id="textarea" placeholder="Leave us a comment"></textarea><br>
        
        <div>
            <button class="comment-btn" type="submit" name="commentSubmit">Comment</button>
        </div>
        </form>
    ';
}else{
    $_SESSION['message'] = "Please login in order to check the articles";
    $_SESSION['msg_type'] = "login";
    header("Location: landing.php?error=login");
    exit();
    }
    getComments($conn);
?>
    </section>
    </div>
</main>
<?php
    require "footer.php";
?>