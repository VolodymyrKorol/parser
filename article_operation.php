<?php
include_once('db.php');
get_article_edit((int)$_GET['article_id']);




function get_article_edit($id)
{


$db = new DataBase();
$res = $db->query("SELECT * FROM `articles` WHERE `id` = '" . $_GET['article_id'] . "'");
$response = ``;




if ($res) {
$response = $response .
"<div class=\"card\">
    <div class='card-container'>
    <form action='/parser/save.php' method='post'>
    <div class=\"toolbar\">
    <div class='toolbar-container'>
        <div class='toolbar-item'>
            <input type='submit' name='edit-submit' class='save-article' value='save'>
        </div>
        <div class='toolbar-item'>
            <a href='/parser/articles.php?article_id=" . $id . "' class='go-back-article'>Go back</a>
        </div>

      </div>
    </div>
        <img class='article_img' src='" . "http://" . $_SERVER['HTTP_HOST'] . $res[0]['img_url'] . "' alt='img'>
        <input type='text' name='id' value='".$id."' style='display: none'>
        <label for='#title'>Change article title</label>
        <h2 class=\"article_title\"><input type='text' id='title-edit' name='title' value='" . $res[0]['title'] . "'></h2>
        <label for='#text'>Change article text</label>
        <p><textarea type='text' id='text-edit' name='text'>" . $res[0]['text'] . " </textarea></p>
    </form>
    </div>
</div>


<hr>
";

}
echo $response === '' ? 'There are no last articles!' : $response;
}
