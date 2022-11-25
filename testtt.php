<?php
    include("conn.php");
    $sql = "SELECT * FROM highlife";
    $allresult = mysqli_query($conn, $sql);
    $error='';
    $album=$artist=$band=$rating=$id=$i='';
    $errors= array('album'=>'', 'artist'=>'', 'band'=>'', 'rating'=>'');
    if (isset($_POST["edit$i"])){
        header("Location: record.php");
        if (empty($_POST["album$i"] || empty($_POST["artist$i"]) || empty($_POST["album$i"] || empty($_POST["artist$i"])))){
            $errors['album']="Field cannot be Empty";
        }else{
            $album= $_POST["album$i"];
            $artist= $_POST["artist$i"];
            $band= $_POST["band$i"];
            $rating= $_POST["rating$i"];
            $id= $_POST["id$i"];
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
    
        If (array_filter($errors)){
            echo '<center>';
            echo "<div class='hero-error'>Error in the form</div>";
            echo '</center>';
        }else{
            // $newid=$_POST['id'];
            // $newalbum=$_POST['album'];
            // $newartist=$_POST['artist'];
            // $newband=$_POST['band'];
            // $newrating=$_POST['rating'];
            include("conn.php");
            if($conn){
                echo"Hurray its $id";
            }else{
                echo"Oooops!";
            }
            echo "id    _= ". $id;
            // $query="UPDATE `highlife` SET `song_name` = '$newalbum', `artist` = '$newartist', `band_id` = '$newband', `rating` = '$newrating' WHERE id=$newid";
            $query="UPDATE `highlife` SET `song_name` = '$album', `artist` = '$artist', `band_id` = '$band', `rating` = '$rating' WHERE id=$id";
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
        $i=0;
        while ($row = mysqli_fetch_assoc($allresult)){
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
