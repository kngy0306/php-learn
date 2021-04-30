<?php
// パスワードを記録したファイル
// /Users/kona/PHPCode/NewGraduateTraining/section2/basicAuth.php
// パス
// $2y$10$f0GDIPwrCkxBokD/dhAGlOEX7ZyEEa0Nxo.vevoQTGU6UZfQFfxyO

echo __FILE__;
echo "<br>";

echo (password_hash("password1234", PASSWORD_BCRYPT));