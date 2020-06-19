<?php

include_once('db.php');
$db = new DataBase();
$res = $db->query("SELECT * FROM `articles` ORDER BY `date_up` LIMIT 3");
$response = ``;
if ($res) {
    for ($i = 0; $i < count($res); $i++) {
        $response = $response.
            "<div class=\"card\">
        <img class='article_img' src='"."http://".$_SERVER['HTTP_HOST'].$res[$i]['img_url']."' alt='img'>
        <h2 class=\"article_title\">".$res[$i]['title']."</h2>
        <span class='article_date'>Created at:".$res[$i]['date_up']."</span>
        <p>" . $res[$i]['text'] . "</p>
        </div>
        <hr>
        ";

    }
}

echo $response === '' ? 'There are no last articles!' : $response;

