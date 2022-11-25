<?php
$a = '<a href="record.php">MASTER RECORD</a>';
$b = '<a href="edit.php">EDIT RECORD</a>';
$c = '<a href="add.php">ADD TO RECORD</a>';
$d = '<a href="update.php">UPDATE RECORD</a>';
$e = '<a href="delete.php">DELETE RECORD</a>';
echo '<nav style="background-color:rgb(32, 157, 157);">';
echo '<pre>';
    printf("% 55s", $a);
    printf("% 60s", $b);
    printf("% 60s", $c);
    printf("% 60s", $d);
    printf("% 60s", $e);
echo '</pre>';
echo '</nav>';
?>