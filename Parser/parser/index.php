<?php include('db.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
    <script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>

</head>
<body>
<form class="parse-form" action="parser.php" method="post">
    <div class="container">
        <input class="parse-btn" name="parse" type="submit" value="Start parse">
        <h1 id="load-status"></h1>
    </div>
</form>
<hr>
<div class="article">
    <div class="container">
        <div class="article-wrapper">
            <form id="article-form">
                <div class="container">
                    <input type="submit"  class="articles-btn" name="article" value="Get last 3 articles">
                </div>
            </form>
            <h3>The latest 3 articles</h3>
            <div id="articles_body">


            </div>
<?php


            if($_SERVER['HTTP_REFERER'] === 'http://'.$_SERVER['HTTP_HOST'].'/'){

               ?>



                <?php
            }

            ?>
        </div>
    </div>
</div>
<script src="assets/js/script.js"></script>

</body>
</html>

