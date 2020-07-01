<?php include('db.php');
session_start();
if(isset($_SESSION['user'])){
    $data = $_SESSION['user'];
}
require("blocks/head.php");
require_once('blocks/header.php');
?>


<hr>
<div class="article">
    <div class="container">
        <div class="article-wrapper">
            

        </div>
    </div>
</div>
<script src="assets/js/script.js"></script>
<?php
require_once('blocks/footer.php');

