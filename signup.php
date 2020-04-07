<main>
    <div class="main-wrapper">
        <section class="hero">
            <div class="form-head">
                <h1>Sign UP</h1>
            </div>
            <?php
            
            ?>
            <div class="form-wrapper">
                <form class="signup-form" action="includes/signup.inc.php" method="POST">
                    <div class="reg-inp"><input class="signup-input" type="text" name="uid" placeholder="Username:"
                            value="<?php echo isset($_POST['uid']) ? $username :'';?>">
                        <i class="fa fa-user fa-lg fa-fw"></i>
                    </div>
                    <div class="reg-inp"><input class="signup-input" type="text" name="email" placeholder="Email:"
                            value="">
                        <i class="fa fa-envelope fa-lg fa-fw"></i>
                    </div>
                    <div class="reg-inp"><input class="signup-input" type="password" name="pwd" placeholder="Password:"
                            value="">
                        <i class="fas fa-key fa-lg fa-fw"></i>
                    </div>
                    <div class="reg-inp"><input class="signup-input" type="password" name="pwd-repeat"
                            placeholder="Repeat password:" value="">
                        <i class="fas fa-key fa-lg fa-fw"></i>
                    </div>
                    <button class="reg-sub" type="submit" name="signup-submit">Signup</button>
                </form>
            </div>
        </section>
    </div>
</main>

<?php
    require"footer.php";
?>