<h1>文字列の連結</h1>
echo "早川" .= "聖来";
<br>
<?php
  $str = "早川";
  $str2 = "聖来";
  echo $str .= $str2;
?>

<h1>文字列の分割</h1>
<h3>explode ( 区切り文字列, 分割対象文字列 [, 分割個数の最大値 ] ) ;</h3>
<pre>
<?php
  $str = "Sun/Mon/Tue/Wed/Thu/Fri/Sat";

  print_r(explode("/", $str));

  print_r(explode("/", $str, 3));
?>
</pre>

<h3>str_split ( 分割対象文字列 [, 文字数 ] ) ;</h3>
<pre>
<?php
  $str = "CDEFG";

  echo "CDEFG<br>";
  echo "print_r(str_split($str));<br>";
  print_r(str_split($str));
  echo "print_r(str_split($str, 2));<br>";
  print_r(str_split($str, 2));
?>
</pre>