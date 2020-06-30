<?php
session_start();
require("../db.php");

if (isset($_POST['submit-login'])) {
    $db = new DataBase();
    $error = [];
    $res = $db->query("SELECT * FROM `users` WHERE `user_login` = '" . $_POST['login'] . "'");
    if (!empty($res)) {

        if (password_verify($_POST['password'], $res[0]['user_pass'])) {
            $_SESSION['user'] = $res[0];
            switch ($_SESSION['user']['status']){
                case 0:
                    header('Location: /parser');
                case 1:
                    header('Location: /parser/admin/index.php');


            }
        }
        array_push($error, "Incorrect password");

    }else {
        array_push($error, "Incorrect login");
    }
}
require_once('../blocks/head.php');
require_once('../blocks/header.php');
?>


    <div class="main">
        <div class="container">
            <div class="auth_container">
                <form action="login.php" method="POST" class="login_form form">
                    <label for="login">Input you login</label>
                    <input type="text" class="login-input" name="login" id="login" placeholder="login..." value="<?php echo !empty($error)?$_POST['login']:""?>">
                    <label for="password">Input your password</label>
                    <input type="password" class="login-input" name="password" id="password" placeholder="password...">
                    <input type="submit" name="submit-login" id="submit-login" value="Sign in">
                    <?php if(!empty($error)):
                      foreach ($error as $er):
                        ?>
                       <p><?php echo $er ?></p>
                     <?php
                      endforeach;
                      endif;?>
                    <p></p>
                </form>
            </div>
        </div>
    </div>


<?php

require_once('../blocks/footer.php');

