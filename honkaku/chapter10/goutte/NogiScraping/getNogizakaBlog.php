<?php
require_once dirname(__FILE__) . '/../../../vendor/autoload.php';

$member_array = [
    "秋元真夏" => "manatsu.akimoto",
    "齋藤飛鳥" => "asuka.saito",
    "遠藤さくら" => "sakura.endou",
    "早川聖来" => "seira.hayakawa",
];

if($_POST["name"]){
    $name = $_POST['name'];
    $member_url = 'http://blog.nogizaka46.com/' . $member_array[$name] . '/';

    $goutteClient = new Goutte\Client();
    $crawler = $goutteClient->request('GET', $member_url);

    $img_array = $crawler->filter('.entrybody')->first()->filter('img')->extract(['src']);

    foreach ($img_array as $img){
        echo '<img style="max-width: 500px; max-height: 500px;" src="' . $img . '">';
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="getNogizakaBlog.php" method="POST">
    <input type="text" name="name">
    <button type="submit">送信</button>
</form>
</body>
</html>
