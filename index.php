<?php include('db.php');
session_start();
if(isset($_SESSION['user'])){
    $data = $_SESSION['user'];
}
require("blocks/head.php");
require_once('blocks/header.php');
?>

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

        </div>
    </div>
</div>
<script src="assets/js/script.js"></script>
<?php
require_once('blocks/footer.php');

