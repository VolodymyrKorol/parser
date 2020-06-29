<?php
session_start();
require("../db.php");

if(isset($_POST['submit-login'])){
    $db = new DataBase();
    if($res = $db->query("SELECT * FROM `users` WHERE `user_login` = '".$_POST['login']."' AND `user_pass` = '".$_POST['password']."'")){
       $_SESSION['user'] = $res[0];
       header('Location: /parser');

    }
}

require_once('../blocks/header.php');
?>


    <div class="main">
        <div class="container">
            <div class="auth_container">
                <form action="login.php" method="POST" class="login_form form">
                    <label for="login">Input you login</label>
                    <input type="text" class="login-input" name="login"  id="login" placeholder="login...">
                    <label for="password">Input your password</label>
                    <input type="password" class="login-input" name="password" id="password" placeholder="password...">
                    <input type="submit" name="submit-login" id="submit-login" value="Sign in">
                    </form>
            </div>
        </div>
    </div>



<?php

require_once('../blocks/footer.php');

