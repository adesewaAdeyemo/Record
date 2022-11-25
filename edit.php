<?php
$value= "Update";
$_id=$error=$content='';    
$album=$artist=$band=$rating=$id='';
$errors= array('album'=>'', 'artist'=>'', 'band'=>'', 'rating'=>'');

    if (isset($_POST['edit'])){
        If (array_filter($errors)){
            echo '<center>';
            echo "<div class='hero-error'>Error in the form</div>";
            echo '</center>';
        }else{
            $newid=$_POST['id'];
            $newalbum=$_POST['album'];
            $newartist=$_POST['artist'];
            $newband=$_POST['band'];
            $newrating=$_POST['rating'];
            include("conn.php");
            if($conn){
                echo"Hurray";
            }else{
                echo"Oooops!";
            }
            echo "id = ". $newid;
            $query="UPDATE `highlife` SET `song_name` = '$newalbum', `artist` = '$newartist', `band_id` = '$newband', `rating` = '$newrating' WHERE id=$newid";
            if(mysqli_query($conn,$query)){
                echo "Updated successfully";
            }else{
            $error = "error: ". mysqli_error($conn);
            $error.= "error: ". $newid;
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
    <title>Update</title>
    <link rel="stylesheet" href="record.css">
</head>
<body>
    <?php 
    include('nav.php');
    echo '<center>'; ?>
<form class="form" style="backgroud-color:#09f4f4; width:60%; border-top:5%;">
    <?php
        echo '<table border=".2" width="100%" bgcolor="#F4f4f4">';
        echo '<tr bgcolor="#09f9f9">';
            echo'<td><strong><center>Song Name</center></strong></td>';
            echo'<td><strong><center>Artist</center></strong></td>';
            echo'<td><strong><center>Band_ID</center></strong></td>';
            echo'<td><strong><center>Rating</center></strong></td>';
            echo'<td><strong><center>Save</center></strong></td>';
        echo '</tr>';
        $i=0;

        include('conn.php');
        $que="SELECT id FROM highlife";
        $count= mysqli_query($conn, $que);
        foreach($count as $val){
                // print_r($_id);
                    // echo "<br>";
                    // echo $_id['id'];
                    // while (mysqli_fetch_array($count)){
                    // global $i;
                    // $_id= $i;
                $_id=$val['id'];
                include("conn.php");
                $query="SELECT * FROM highlife WHERE id = $_id";
                $qresult= mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($qresult);
                $album= $row['song_name'];
                $artist= $row['artist'];
                $band= $row['band_id'];
                $rating= $row['rating'];
                $id= $row['id'];
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST' style="backgroud-color:#09f4f4; width:60%;">
            <?php
            echo '<tr>';
                echo "<td><input type='text' name='album' style='border:none;' value='". $album ."'></td>";
                echo'<div class="error">'. $errors['album'] .'</div>';
                echo "<td><input type='text' name='artist' style='border:none;' value='". $artist ."'></td>";
                echo'<div class="error">'. $errors['artist'] .'</div>';
                echo "<td><input type='text' name='band' style='border:none;' value='". $band ."'></td>";
                echo'<div class="error">'. $errors['band'] .'</div>';
                echo "<td><input type='text' name='rating' style='border:none;' value='". $rating ."'></td>";
                echo'<div class="error">'. $errors['rating'] .'</div>';
                echo"<input type='hidden' name='id' value='". $id ."'>";
                echo"<td><input type='submit' name='edit' id='edit' style='border:none;' value=' + '></td>";
                echo'<div class="hero-error">'. $error .'</div>';
            echo '</tr>';
            echo '</form>';
            }
        ?>
 <?php echo '</form></div><center>'; ?>

    <script>
        document.querySelectorAll('submit').addEventListener(click,(e) =>{
            e.preventDefault();
        })
        document.querySelector('#add').addEventListener(click, func);
        function func(){
            e.preventDefault();
            alert("Delete record permanently");
        }

    </script>

</body>
</html>