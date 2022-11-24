<?php
session_start();
$value= "Update";
$_id=$error=$content='';    
$album=$artist=$band=$rating=$id='';
$errors= array('album'=>'', 'artist'=>'', 'band'=>'', 'rating'=>'');
$content="<legend>Enter the unique ID of the record row to be Edited...<legend>";
$content.= "<input type='text' name='record_id' Value='". $_id ."'>";
$content.= "<input type='submit' name='confirmid' id='confirmid' value='Confirmid'>";
if (isset($_POST['confirmid'])){
    $_id= $_POST['record_id'];
    $content= 'EDIT ID = '. $_id;  
    include("conn.php");
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
        include("nav.php");
        include("content.php"); 
        if(!empty($_POST['record_id'])){
            $_id= $_POST['record_id'];
            global $_id;
            if (!is_numeric($_POST['record_id'])){
                $error= "Invalid ID";
            }else{
                include("conn.php");
                $query="SELECT * FROM highlife WHERE id = $_id";
                $qresult= mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($qresult);
                $album= $row['song_name'];
                $artist= $row['artist'];
                $band= $row['band_id'];
                $rating= $row['rating'];
                $id= $row['id'];
            }
        }
        // echo "id    _= ". $id;
        if (isset($_POST['add'])){
            If (array_filter($errors)){
                echo '<center>';
                echo "<div class='hero-error'>Error in the form</div>";
                echo '</center>';
            }else{
                global $_id;
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
                // $id=$_id;
                // $query="UPDATE `highlife` SET `song_name` = 'miss', `artist` = 'Me', `band_id` = '1', `rating` = '10' WHERE `highlife`.`id` = 21";
                $query="UPDATE `highlife` SET `song_name` = '$newalbum', `artist` = '$newartist', `band_id` = '$newband', `rating` = '$newrating' WHERE id=$newid";
                // $query="UPDATE `highlife` SET song_name = $newalbum, artist = $newartist, band_id = $newband, rating = $newrating WHERE id=$_id";
                if(mysqli_query($conn,$query)){
                    header("Location: record.php");
                    echo "Updated successfully";
                }else{
                $error = "error: ". mysqli_error($conn);
                $error.= "error: ". $_id;
                }
            }
        }
        include("entryform.php");
        ?>
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