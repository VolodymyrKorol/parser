<?php
if(isset($_SESSION['user']))
$data = $_SESSION['user'];


?>


<header class="header main-item">
    <div class="container">
        <div class="header-container">
            <div class="logo">
                <a href="/">P</a>
            </div>
            <div class="menu flex-1">
                <div class="menu-item"><a href="/parser">Home</a></div>
                <div class="menu-item"><a href="/parser/articles.php?article_id=-1">Articles</a></div>

            </div>

            <?php if(isset($data)):?>
                <div class="profile-bar">
                    <div class="profile-bar_img"><a href="#""><img class="user-img_small" src="<?php echo $data['user_img']?>" alt="img"></a></div>
                    <div class="profile-bar_name"><a href="#"><?php echo $data['user_name']?></a></div>
                    <div class="menu-item"><a href="/parser/authorize/logout.php">Log out</a></div>

                    <?php if($data['status']): ?>
                        <div class="menu-item"><a class="red" href="/parser/admin/index.php">Admin panel</a></div>
                    <?php endif;?>


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