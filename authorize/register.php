<?php
session_start();
require("../db.php");

if(isset($_POST['submit-register'])){
    $db = new DataBase();

    $error = [];

    if(trim($_POST['user_name']) !== ""){
        $new_user['user_name'] = $_POST['user_name'];
        var_dump("1");
    }else{
        array_push($error,"Name is incorrect!");
    }

    if(trim($_POST['login']) !== ""){
        $new_user['user_login'] = trim($_POST['login']);
        var_dump("2");

    }else{
        array_push($error,"Login is incorrect!");
    }


    if(trim($_POST['password']) !== "") {
        $new_user['user_password'] = password_hash($_POST['password'],PASSWORD_DEFAULT );
        var_dump("3");

    }else{
        array_push($error,"Password is incorrect!");
    }

    if(preg_match("/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/s", $_POST['email'])){
        $new_user['user_email'] = $_POST['email'];
        var_dump("4");

    }else{
        array_push($error,"Email is incorrect!");
    }

    if($_POST['password'] !== $_POST['re_password']){
         array_push($error,"Passwords mismatch!");
    }

    if(empty($error)){
        $sql = " INSERT INTO users(user_name, user_pass, user_login, user_email, user_img, created_at) 
        VALUES ('".$new_user['user_name']."', '".$new_user['user_password']."', '".$new_user['user_login']."','".$new_user['user_email']."','img.png','".date('Y-M-D')."')";
        var_dump($db->execute($sql));

    }
}

require_once('../blocks/header.php');
?>


    <div class="main">
        <div class="container">
            <div class="auth_container">
                <form action="register.php" method="POST" class="register_form form">

                    <label for="user_name">Input your name</label>
                    <input type="text" class="login-input" name="user_name" id="user_name" placeholder="Enter your name...">

                    <label for="login">Input you login</label>
                    <input type="text" class="login-input" name="login"  id="login" placeholder="login...">

                    <label for="password">Enter your password</label>
                    <input type="password" class="login-input" name="password" id="password" placeholder="password...">

                    <label for="re_password">Re-enter password</label>
                    <input type="password" class="login-input" name="re_password"  id="re_password" placeholder="re-enter password...">

                    <label for="email">Enter your email</label>
                    <input type="text" class="login-input" name="email"  id="email" placeholder="enter your email...">


                    <input type="submit" name="submit-register" id="submit-register" value="Register">
                    <?php
                    if (!empty($error)):
                     for ($i = 0;$i<count($error);$i++):
                    ?>
                         <p><?php echo $error[$i]; ?></p>
                     <?php endfor;
                    endif;
                    ?>
                </form>
            </div>
        </div>
    </div>



<?php

require_once('../blocks/footer.php');


