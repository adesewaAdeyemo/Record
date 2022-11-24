<?php
    include("conn.php");
    $sql = "SELECT * FROM highlife";
    $allresult = mysqli_query($conn, $sql);
    $error='';
    $errors= array('album'=>'', 'artist'=>'', 'band'=>'', 'rating'=>'');

    if (isset($_POST['edit'])){
        $album= $_POST['album'];
        $artist= $_POST['artist'];
        $band= $_POST['band'];
        $rating= $_POST['rating'];
        $id= $_POST['id'];
        if (empty($_POST['album'] || empty($_POST['artist']) || empty($_POST['album'] || empty($_POST['artist'])))){
            $errors['album']="Field cannot be Empty";
        }else{
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

        // echo 'id = '. $id;
        // If (array_filter($errors)){
        //     echo '<center>';
        //     echo "<div class='hero-error'>Error in the form</div>";
        //     echo '</center>';
        // }else{
            // include('conn.php');
            // $query="UPDATE `highlife` SET `song_name` = '$album', `artist` = '$artist', `band_id` = '$band', `rating` = '$rating' WHERE id=$id";
            // if(mysqli_query($conn, $query)){
            //     // header("Location: record.php");
            //    echo "Updated successfully";
            // }else{
            //     $error= "error: ". mysqli_error($conn);
            // }
        // }  
        If (array_filter($errors)){
            echo '<center>';
            echo "<div class='hero-error'>Error in the form</div>";
            echo '</center>';
        }else{
            global $id;
            $newid=$_POST['id'];
            $newalbum=$_POST['album'];
            $newartist=$_POST['artist'];
            $newband=$_POST['band'];
            $newrating=$_POST['rating'];
            include("conn.php");
            if($conn){
                echo"Hurray its $newid";
            }else{
                echo"Oooops!";
            }
            echo "id    _= ". $newid;
            $query="UPDATE `highlife` SET `song_name` = '$newalbum', `artist` = '$newartist', `band_id` = '$newband', `rating` = '$newrating' WHERE id=$newid";
            if(mysqli_query($conn,$query)){
                // header("Location: record.php");
                echo "Updated successfully";
            }else{
            $error = "error: ". mysqli_error($conn);
            $error.= "error: ". $id;
            }
        }


        
    }     

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
    ?>
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

        while ($row = mysqli_fetch_assoc($allresult)){
        echo '<tr>';
            echo'<td><input type="text" name="album" style="border:none;" value="'. $row['song_name'] .'"></td>';
            echo'<div class="error">'. $errors['album'] .'</div>';
            echo'<td><input type="text" name="artist" style="border:none;" value="'. $row['artist'] .'"></td>';
            echo'<div class="error">'. $errors['artist'] .'</div>';
            echo'<td><center><input type="text" name="band" style="border:none;" value="'. $row['band_id'] .'"></center></td>';
            echo'<div class="error">'. $errors['band'] .'</div>';
            echo'<td><center><input type="text" name="rating" style="border:none;" value="'. $row['rating'] .'"></center></td>';
            echo'<div class="error">'. $errors['rating'] .'</div>';
            echo'<input type="hidden" name="id" value="'. $row['id'] .'">';
            echo'<td><input type="submit" name="edit" id="edit" style="border:none;" value="+"></td>';
            echo'<div class="error">'. $error .'</div>';
        echo '</tr>';
        }
        echo '</table';
    echo '</form></center>';

    ?>

<script>
        document.querySelectorAll('submit').addEventListener(click,(e) =>{
            e.preventDefault();
        })
        document.querySelector('#edit').addEventListener(click, func);
        function func(){
            e.preventDefault();
            alert("Delete record permanently");
        }

    </script>  
</body>
</html>
