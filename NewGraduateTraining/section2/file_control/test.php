<?php

$contactFile = ".contact.dat";

$fileContents = file_get_contents($contactFile);
file_put_contents($contactFile, "テストです", FILE_APPEND);
echo $fileContents;