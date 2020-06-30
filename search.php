<?php
include_once('db.php');

get_search_results($_GET['search_text']);

function get_search_results($search_query)
{

    $db = new DataBase();
    $res = $db->query("SELECT * FROM `articles` WHERE `title` LIKE '" . $search_query . "%'");
    $response = ``;
    if ($res) {
        echo "SSS";
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


//
//        $response = $response . "<div class='pagination'><div class='pagination-container'>";
//
//        $res = $db->query("SELECT COUNT(*) FROM `articles` ");
//        $page_count = (int)$res[0][0];
//
//        for ($i = 0; $i < round($page_count / 5); $i++) {
//
//            $response = $response . "<div class='pagination-item'>
//                    <a href='/parser/articles.php?article_id=-1&portion=" . $i . "'>" . ($i + 1) . "</a>
//                  </div>";
//
//        }
//        $response = $response . "</div></div>";

    }
    echo $response === '' ? 'There are no last articles!' : $response;
}