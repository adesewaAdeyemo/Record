<?php
    if (isset($_POST['add'])){
        if (empty($_POST['album'] || empty($_POST['artist']) || empty($_POST['album'] || empty($_POST['artist'])))){
            $errors['album']="Field cannot be Empty";
        }else{
            $album= $_POST['album'];
            $artist= $_POST['artist'];
            $band= $_POST['band'];
            $rating= $_POST['rating'];
            $id= $_POST['id'];
            if ((!preg_match('/^[a-zA-Z\s]+$/', $album))){
                $errors['album']="Invalid Album Name";
            }
            if ((!preg_match('/^[a-zA-Z\s]+$/', $artist))){
                $errors['artist']="Invalid Artist Name";
            }
            if ((!is_numeric($band))){
                $errors['band']="Invalid band Id";
            }
            if ((!is_numeric($rating))){
                $errors['rating']="Invalid rating";
            }
        }
    }

    echo '<center>';
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Album</label><input type="text" name="album" value="<?php echo $album; ?>"><br>
        <div class="error"><?php echo $errors['album']; ?></div>
        <label>Artist</label><input type="text" name="artist" value="<?php echo $artist; ?>"><br>
        <div class="error"><?php echo $errors['artist']; ?></div>
        <label>Band ID</label><input type="text" name="band" value="<?php echo $band; ?>" ><br>
        <div class="error"><?php echo $errors['band']; ?></div>
        <label>Rating</label><input type="text" name="rating" value="<?php echo $rating; ?>"><br>
        <div class="error"><?php echo $errors['rating']; ?></div>
        <input type="submit" name="add" id="add" value="<?php echo $value; ?>">
        <div class="error"><?php echo $error; ?></div>
    </form>
    <?php
        echo '</center>';
    ?>
