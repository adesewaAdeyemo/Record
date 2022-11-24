<?php
    include("conn.php");
    $sql = "SELECT * FROM highlife";
    $allresult = mysqli_query($conn, $sql);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
    <link rel="stylesheet" href="record.css">
</head>
<body>
    <?php
    include('nav.php');
        echo '<center>';
        echo '<table border=".2" width="60%" bgcolor="#F4f4f4" style="margin-top:6%;">';
        echo '<tr bgcolor="#09f9f9">';
            echo'<td><strong><center>Song Name</center></strong></td>';
            echo'<td><strong><center>Artist</center></strong></td>';
            echo'<td><strong><center>Band_ID</center></strong></td>';
            echo'<td><strong><center>Rating</center></strong></td>';
        echo '</tr>';

        while ($row = mysqli_fetch_assoc($allresult)){
        echo '<tr>';
            echo'<td>'. $row['song_name'] .'</td>';
            echo'<td>'. $row['artist'] .'</td>';
            echo'<td><center>'. $row['band_id'] .'</center></td>';
            echo'<td><center>'. $row['rating'] .'</center></td>';
        echo '</tr>';
        }
        echo '</table';
        echo '</center>';

    ?>

    
</body>
</html>
