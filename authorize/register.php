<?php
require("../db.php");
session_start();

if (isset($_POST['submit-register'])) {
    $db = new DataBase();
    $new_user = [];
    $error = [];

    if (trim($_POST['user_name']) !== "") {
        $new_user['user_name'] = $_POST['user_name'];
    } else {
        array_push($error, "Name is incorrect!");
    }

    if (trim($_POST['login']) !== "") {
        $new_user['user_login'] = trim($_POST['login']);
        $unique_login = $db->query("SELECT * FROM `users` WHERE `user_login` ='" . $_POST['login'] . "'");
        if (!empty($unique_login)) {
            array_push($error, "User with the same login exists!");

        }
    } else {
        array_push($error, "Login is incorrect!");
    }


    if (trim($_POST['password']) !== "") {
        $new_user['user_password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    } else {
        array_push($error, "Password is incorrect!");
    }

    if (preg_match("/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/s", $_POST['email'])) {
        $new_user['user_email'] = $_POST['email'];
        $unique_email = $db->query("SELECT * FROM `users` WHERE `user_email` ='" . $_POST['email'] . "'");
        if (!empty($unique_email)) {
            array_push($error, "User with the same email is registered!");
        }

    } else {
        array_push($error, "Email is incorrect!");
    }

    if ($_POST['password'] !== $_POST['re_password']) {
        array_push($error, "Passwords mismatch!");
    }

    if (empty($error)) {
        $sql = " INSERT INTO users(user_name, user_pass, user_login, user_email, user_img, created_at) 
        VALUES ('" . $new_user['user_name'] . "', '" . $new_user['user_password'] . "', '" . $new_user['user_login'] . "','" . $new_user['user_email'] . "','https://offvkontakte.ru/wp-content/uploads/avatarka-pustaya-vk_23.jpg','" . date('Y-M-D') . "')";
        $db->execute($sql);
        $_SESSION['reg_data'] = [];
        header("Location: /parser");
    }

    $_SESSION['reg_data'] = $new_user;
    $_SESSION['reg_data']['user_password'] = $_POST['password'];


}

require_once('../blocks/header.php');
?>

    <div class="main">
        <div class="container">
            <div class="auth_container">
                <form action="register.php" method="POST" class="register_form form">

                    <label for="user_name">Input your name</label>
                    <input type="text" class="login-input" name="user_name" id="user_name"
                           placeholder="Enter your name..."
                           value="<?php echo !empty($error)? $_SESSION['reg_data']['user_name'] : "" ?>">

                    <label for="login">Input you login</label>
                    <input type="text" class="login-input" name="login" id="login" placeholder="login..."
                           value="<?php echo !empty($error) ? $_SESSION['reg_data']['user_login'] : "" ?>">

                    <label for="password">Enter your password</label>
                    <input type="password" class="login-input" name="password" id="password" placeholder="password..."
                           value="<?php echo !empty($error) ? $_SESSION['reg_data']['user_password'] : "" ?>">

                    <label for="re_password">Re-enter password</label>
                    <input type="password" class="login-input" name="re_password" id="re_password"
                           placeholder="re-enter password...">

                    <label for="email">Enter your email</label>
                    <input type="text" class="login-input" name="email" id="email" placeholder="enter your email..."
                           value="<?php echo !empty($error) ? $_SESSION['reg_data']['user_email'] : "" ?>">


                    <input type="submit" name="submit-register" id="submit-register" value="Register">
                    <?php
                    if (!empty($error)):
                        for ($i = 0; $i < count($error); $i++):
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


