<?php
session_start();
if ($_SESSION['user']['status']):

    include('../db.php');
    require("../blocks/head.php"); ?>

    <div class="main-admin">
        <div class="container">
            <?php require_once('blocks/admin_header.php'); ?>
            <div class="content-admin main-item flex-1">
                <div class="load-container">
                    <span class="load-line"></span>
                </div>
                <div id="myDiv"></div>
                <div class="search">
                        <input class="search-input" type="text" name="search-text" id="search-text" placeholder="What do you search?">
                    <a id="submit-search" href="#">Search</a>
                </div>
                <div id="articles_body">
                    <h1>Admin panel</h1>
                    <div class="admin-profile">
                        <div class="admin-img"><img class="admin-img_img" src="<?php echo $_SESSION['user']['user_img']?>" alt="img"> </div>
                        <div class="admin-info">
                            <div class="admin-name"><h1><?php echo $_SESSION['user']['user_name']?></h1></div>
                            <div class="admin-status"><h4>Status: <?php echo $_SESSION['user']['status'] == 1?"Admin": "User"?></h4></div>
                            <div class="admin-date"> Created at: <span><?php echo $_SESSION['user']['created_at']?></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('../blocks/footer.php'); ?>
    </div>
<?php
else:
    header("Location: /parser/authorize/login.php");
endif;
?>



