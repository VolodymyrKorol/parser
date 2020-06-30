<?php



function get_article($id)
{


$db = new DataBase();
$res = $db->query("SELECT * FROM `articles` WHERE `id` = '" . $_GET['article_id'] . "'");
$response = ``;


$response = $response . "
<div class=\"toolbar\">
    <div class='toolbar-container'>
        <div class='toolbar-item'>
            <a href='/parser/articles.php?article_id=" . $_GET['article_id'] . "&operation=edit' class='edit'>Edit</a>
        </div>
        <div class='toolbar-item'>
            <a href='/parser/articles.php?article_id=" . $_GET['article_id'] . "&operation=delete' class='edit'>Delete</a>
        </div>

    </div>
</div>
";

if ($res) {
$response = $response .
"<div class=\"card\">
    <div class='card-container'>
        <img class='article_img' src='" . "http://" . $_SERVER['HTTP_HOST'] . $res[0]['img_url'] . "' alt='img'>
        <h2 class=\"article_title\">" . $res[0]['title'] . "</h2>
        <span class='article_date'>Created at:" . $res[0]['date_up'] . "</span>
        <p>" . $res[0]['text'] . " <span class=\"gray\">. . .</span></p>
    </div>
</div>


<hr>
";

}
echo $response === '' ? 'There are no last articles!' : $response;
}
