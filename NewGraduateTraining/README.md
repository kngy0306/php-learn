## section1

- グローバル変数を関数内で使用したいとき

```php

$globalVariable = "this is global";

functio echoText() {
  global $globalVariable;
  echo $globalVariable;
}

```

## section2

- **exit**は処理を止める。

- HTML内にPHPを記述するとき

```php

html

<?php if () :?>
html
<?php endif; ?>

```

- クリックジャッキング対策
  - サーバーの.htaccessに**Header set X-FRAME-POTIONS "DENY"**と記述することで他サイトのiframe内に表示されなくなる。
  - もしくはPHPファイルに**header("X-FRANE-OPTIONS:DENY");**を記述する。

- ファイル単位で読み込む、書き込む
  ```file_get_contents```
  ```file_put_contents```