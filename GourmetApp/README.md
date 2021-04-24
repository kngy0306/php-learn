## GourmetApp

### [ホットペッパーAPI](https://webservice.recruit.co.jp/doc/hotpepper/reference.html)を利用したレストラン検索サイト

### Composerを利用して.envファイルに記載したAPI_KEYを読み込む。

#### composerでインストール
``` 
$ composer require vlucas/phpdotenv
```

#### .envファイルを作成
```

API_KEY = xxx

```

#### autoloadを利用するため、composer.jsonを作成する
```
$ composer init
```

#### phpファイルで,envを読み込み、表示
```php

require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo $_ENV["API_KEY"];

```

```shell
xxx
```

### PHPでcurl関数を使用する
```php

$url = "http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=" . $_ENV["API_KEY"] . "&keyword=長原駅";
$conn = curl_init(); // cURLセッションの初期化
curl_setopt($conn, CURLOPT_URL, $url); //　取得するURLを指定
curl_setopt($conn, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す。
$res =  curl_exec($conn);
echo '<pre>';
var_dump($res);
echo '</pre>';
curl_close($conn); //セッションの終了
```

<img width="50%" alt="スクリーンショット 2021-04-24 13 26 09" src="https://user-images.githubusercontent.com/57553474/115949319-4a9fa100-a50f-11eb-8ec7-c9491d42192d.png">


### jsonのまま出力
```php

$baseurl = "http://webservice.recruit.co.jp/hotpepper/gourmet/v1/";
$keyword = "蒲田";

$params = [
  "key" => $_ENV["API_KEY"],
  "format" => "json",
  "keyword" => $keyword,
  "count" => 1,
];

$url = $baseurl . "?" . http_build_query($params, "", "&");

$result = file_get_contents($url);

echo $result;
```


<img width="50%" alt="スクリーンショット 2021-04-24 15 09 54" src="https://user-images.githubusercontent.com/57553474/115949333-6c008d00-a50f-11eb-91e8-5bb1a3eb00ea.png">



#### 受け取ったjsonを配列に変換して出力
```php

// jsonを連想配列へ
$res = json_decode($result, true);

print_r($res["results"]["shop"][0]);
```

<img width="50%" alt="スクリーンショット 2021-04-24 15 10 01" src="https://user-images.githubusercontent.com/57553474/115949344-7589f500-a50f-11eb-9b78-fc456b589c11.png">
