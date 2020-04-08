<?php
date_default_timezone_set('Europe/Bucharest');
  require "header.php";
  require "includes/dbh.inc.php";
?>
<main>
    <div class="wrapper">
        <section class="hero-section">
            <div class="hero-description">
                <hgroup class="hero-head">
                    <h2>The Braemar Castle</h2>
                    <h4>Braemar, Aberdeenshire, Scotland </h4>
                </hgroup>
                <div class="hero-text">
                    <p>From the Late Middle Ages the castle was a stronghold of the Earls of Mar.[1] The present Braemar
                        Castle was constructed in 1628 by John Erskine, Earl of Mar, as a hunting lodge and to counter
                        the rising power of the Farquharsons,[2] replacing an older building, which was the successor of
                        nearby Kindrochit Castle, which dates from the 11th century AD. The siting of Kindrochit Castle
                        was based upon the strategic location of this site relative to historic crossings of the
                        Grampian Mounth.[3]
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
                <img src="img/breamerCastleScotland.jpg" alt="">
            </div>
        </section>

        <section class="comment-section">
            <form class="form-comment" name="comment" method="POST" action="#">
                <input type="hidden" name="uid" value="">
                <input type="hidden" name="date" value="">
                <textarea name="message" id="textarea" placeholder="Leave us a comment"></textarea><br>
            </form>
            <div>
                <button class="comment-btn" type="submit" name="commentSubmit">Comment</button>
            </div>
        </section>
    </div>

</main>
<?php
  require "footer.php";
?>