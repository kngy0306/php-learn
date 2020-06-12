<h2>配列</h2>
<?php
//配列
$name = array("mai", "erika", "manatsu");
$name2 = array("1", "2");
echo "<pre>"; // 改行して表示してくれる
print_r($name);
echo "</pre>";

// データの追加
array_push($name, "後ろ1", "後ろ2");
// 先頭につなげる
array_unshift($name, "先頭1", "先頭2");
// 結合
array_merge($name, $name2);

// 削除
$name = array("青山", "井川", "植木", "江口", "大竹");

array_splice($name, 1, 2); // (配列, 削除開始index, 削除個数)
// array("青山", "江口", "大竹");

$after_name = array_diff($name, array('青山'));
$after_name = array_values($after_name); // 欠けた番号を埋める

// 配列sort
echo "<pre>";
$name = array("かとう", "いがわ", "えぐち", "うえき", "おおたけ", "あおやま", "きうち");
print_r($name);
echo "<br>";
sort($name);
print_r($name);
echo "</pre>";

// 添え字の更新なしで整列
echo "<pre>";
$test = array("test_2", "test_12", "test_1", "test_100", "test_10");
  
sort($test);
print_r($test);

echo "<br>";

natsort($test);
print_r($test);
echo "</pre>";
?>

<br>
<h2>連想配列</h2>

<pre>
<?php
  $zip_shibuya = array("hiroo"=>"150-0012", "ebisu"=>"150-0013");
  print_r($zip_shibuya);

  // 追加
  $zip_shibuya += array("yoyogi"=>"150-0053");
  print_r($zip_shibuya);

  // 削除
  unset($zip_shibuya["hiroo"]);
  print_r($zip_shibuya);
?>
</pre>

<h2>配列の中に期待する値が存在するか</h2>
<pre>
<?php
$ary1 = array("ホノルル", "ロサンゼルス");
$ary2 = array("NYC"=>"ニューヨーク", "CHI"=>"シカゴ");

// 第三引数にデータ型まで比較するかどうかの指定
var_dump(in_array("ハワイ", $ary1, true));
var_dump(in_array("ホノルル", $ary1, true));
?>
</pre>

<h2>配列の中に指定するキーが存在するか</h2>
<pre>
<?php
 $zip_shibuya = array("150-0012", "ebisu"=>"150-0013", "shoto"=>"150-0046");

 var_dump(array_key_exists("ebisu", $zip_shibuya));
 var_dump(array_key_exists(0, $zip_shibuya)); // index番号もキーとして認識される

  print_r(array_keys($zip_shibuya));
  print_r(array_keys($zip_shibuya, "150-0013")); // その値のキーは何かを出力
?>
</pre>

<h2>配列にfilterをかける</h2>
<pre>
<?php
  // 要素のフィルター
  function less_160($n){
    return $n < 160;
  }

  $ary = array(160, 161, 159);
  print_r(array_filter($ary, "less_160"));

  // keyのフィルター
  function age_21($key){
    return false !== strpos($key, "_21");
  }

  $ary = array("age_19"=>"19歳kona", "age_20"=>"20歳kona", "age_21"=>"21歳kona");

  print_r(array_filter($ary, "age_21", ARRAY_FILTER_USE_KEY));
?>
</pre>

<h2>多次元配列で同一キーの取得</h2>
<pre>
<?php
  $ary = array(
    array("name"=>"kona", "age"=>"21"),
    array("name"=>"mai", "age"=>"27"),
  );

  print_r(array_column($ary, "age"));
  print_r(array_column($ary, "age", "name"));
?>
</pre>

<h2>foreach文</h2>
<pre>
<?php
  $ary = array("kona"=>21, "mai"=>27);

  echo "<table border='1'>";
  foreach($ary as $key => $val){
    echo "<tr><td>" . $key . "</td><td>" . $val . "</td></tr>";
  }
  echo "</table>";
?>
</pre>

<h2>配列の重複を削除してくれる</h2>
<pre>
<?php
  $ary = array("青山", "井川", "植木", "井川", "江口");

  // array_values 添え字を再配置
  print_r(array_values(array_unique($ary)));
?>
</pre>

<h2>配列から連想配列を作成する</h2>
<pre>
<?php
  $ary = array("HNL", "NCE", "CNS");
  $ary2 = array("ホノルル", "ニース", "ケアンズ");
  // "HNL"=>"ホノルル", "NCE"=>"ニース", "CNS"=>"ケアンズ"
  print_r(array_combine($ary, $ary2));
?>
</pre>