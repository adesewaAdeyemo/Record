<!-- <?php
    if (isset($_POST['add'])){
        If (array_filter($errors)){
            echo '<center>';
            echo "<div class='hero-error'>Error in the form</div>";
            echo '</center>';
        }else{
            global $_id;
            $newalbum=$_POST['album'];
            $newartist=$_POST['artist'];
            $newband=$_POST['band'];
            $newrating=$_POST['rating'];
            include("conn.php");
            $query="UPDATE `highlife` SET `song_name` = $newalbum, `artist` = $newartist, `band_id` = $newband, `rating` = $newrating WHERE id=$_id";
            if(mysqli_query($conn,$query)){
                header("Location: record.php");
                echo "Updated successfully";
            }else{
            $error = "error: ". mysqli_error($conn);
            $error.= "error: ". $_id;
            }
        }
    }
    
?> -->