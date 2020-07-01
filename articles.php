<?php

include_once('db.php');


if ($_GET['article_id'] == -1) {
    get_articles_short();
} else {
    get_article($_GET['article_id']);
}

function get_articles_short()
{
    $count = 5 * (int)$_GET['portion'];


    $db = new DataBase();
    $res = $db->query("SELECT * FROM `articles` ORDER BY `id` LIMIT 5 OFFSET ".$count);
    $response = ``;


    if ($res) {
        for ($i = 0; $i < count($res); $i++) {
            $response = $response .
                "<div class=\"card\">
        <div class='card-container'>
        <div class='post-id'><h1>" . $res[$i]['id'] . "</h1></div>
        <img class='article_img' src='" . "http://" . $_SERVER['HTTP_HOST'] . $res[$i]['img_url'] . "' alt='img'>
        <h2 class=\"article_title\">" . $res[$i]['title'] . "</h2>
        <span class='article_date'>Created at:" . $res[$i]['date_up'] . "</span>
        <p>" . mb_strimwidth($res[$i]['text'], 0, 400) . " <span class=\"gray\">. . .</span></p>
        <div ><a class='article-link' href='/parser/articles.php?article_id=" . $res[$i]['id'] . "' onclick='get_article(this)'>Get full</a></div>
        </div>
        </div>
        <hr>
        ";

        }




        $response = $response . "<div class='pagination'><div class='pagination-container'>";

        $res = $db->query("SELECT COUNT(*) FROM `articles` ");
        $page_count = (int)$res[0][0];

        for ($i = 0; $i < round($page_count / 5); $i++) {

            $response = $response . "<div class='pagination-item'>
                    <a href='/parser/articles.php?article_id=-1&portion=" . $i . "'>" . ($i + 1) . "</a>
                  </div>";

        }
        $response = $response . "</div></div>";

    }
    echo $response === '' ? 'There are no last articles!' : $response;
}


function get_article($id)
{


    $db = new DataBase();
    $res = $db->query("SELECT * FROM `articles` WHERE `id` = '" . $_GET['article_id'] . "'");
    $response = ``;


    $response = $response . "
    <div class=\"toolbar\">
    <div class='toolbar-container'>
    <div class='toolbar-item'>
        <a href='/parser/article_operation.php?article_id=" . $_GET['article_id'] . "&operation=edit' class='article-edit'>Edit</a>
    </div>
    <div class='toolbar-item'>
         <a href='/parser/delete.php?article_id=" . $_GET['article_id'] . "' class='article-delete'>Delete</a>
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






