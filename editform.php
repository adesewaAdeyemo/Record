    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST' style="backgroud-color:#09f4f4; width:60%;">
    <?php
        // echo '<center><form action="'. $_SERVER["PHP_SELF"] .'" mthod="POST" style="backgroud-color:#09f4f4; width:60%;">';
        echo '<table border=".2" width="100%" bgcolor="#F4f4f4">';
        echo '<tr bgcolor="#09f9f9">';
            echo'<td><strong><center>Song Name</center></strong></td>';
            echo'<td><strong><center>Artist</center></strong></td>';
            echo'<td><strong><center>Band_ID</center></strong></td>';
            echo'<td><strong><center>Rating</center></strong></td>';
            echo'<td><strong><center>Save</center></strong></td>';
        echo '</tr>';
        $i=0;
        while ($row = mysqli_fetch_assoc($que)){
        echo '<tr>';
            echo "<td><input type='text' name='album$i' style='border:none;' value='". $row['song_name'] ."'></td>";
            echo'<div class="error">'. $errors['album'] .'</div>';
            echo "<td><input type='text' name='artist$i' style='border:none;' value='". $row['artist'] ."'></td>";
            echo'<div class="error">'. $errors['artist'] .'</div>';
            echo "<td><input type='text' name='band$i' style='border:none;' value='". $row['band_id'] ."'></td>";
            echo'<div class="error">'. $errors['band'] .'</div>';
            echo "<td><input type='text' name='rating$i' style='border:none;' value='". $row['rating'] ."'></td>";
            echo'<div class="error">'. $errors['rating'] .'</div>';
            echo"<input type='hidden' name='id$i' value='". $row['id'] ."'>";
            echo"<td><input type='submit' name='edit$i' id='edit' style='border:none;' value='+'></td>";
            echo'<div class="hero-error">'. $error .'</div>';
        echo '</tr>';
        $i++;
        }
        echo '</table';
    echo '</form></center>';

    echo "<p>". $album ."</p>";
    echo "<p>". $artist ."</p>";
    echo "<p>". $band ."</p>";
    echo "<p>". $rating ."</p>";
    echo "<p>". $id ."</p>";
    echo "<p>show thegvjk;hiuvyugcfghbvknmnkjhnm btyfvcgdfdfcghv gufgvbjokljkn</p>";
