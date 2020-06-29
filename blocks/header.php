<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/parser/assets/css/style.css">
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

</head>
<body>

<header class="header">
    <div class="container">
        <div class="header-container">
            <div class="logo">
                <a href="/">P</a>
            </div>
            <div class="menu flex-1">
                <div class="menu-item"><a href="/parser">Home</a></div>
                <div class="menu-item"><a href="/articles.php">Articles</a></div>

            </div>

            <?php if(isset($data)):?>
                <div class="profile-bar">
                    <div class="profile-bar_img"><a href="#""><img class="user-img_small" src="<?php echo $data['user_img']?>" alt="img"></a></div>
                    <div class="profile-bar_name"><a href="#"><?php echo $data['user_name']?></a></div>
                    <div class="menu-item"><a href="/parser/authorize/logout.php">Log out</a></div>
                </div>

            <?php else:?>
            <div class="profile-bar">
                <div class="menu flex-1">
                        <div class="menu-item"><a href="/parser/authorize/register.php">Register</a></div>
                        <div class="menu-item"><a href="/parser/authorize/login.php">Sign in</a></div>

                 </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</header>