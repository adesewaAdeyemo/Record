<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to table</title>
    <link rel="stylesheet" href="record.css">
</head>
<body>
    <?php 
        $error='';
        $value = "Add to record";
        $album=$artist=$band=$rating='';
        $errors= array('album'=>'', 'artist'=>'', 'band'=>'', 'rating'=>'');    
        include("nav.php");
        include("entryform.php");       
        if (isset($_POST['add'])){
            If (array_filter($errors)){
                echo '<center>';
                echo "<div class='hero-error'>Error in the form</div>";
                echo '</center>';
            }else{
                include('conn.php');
                $sql="INSERT INTO highlife(song_name, artist, band_id, rating) VALUES('$album', '$artist', '$band', '$rating')";
                if(mysqli_query($conn,$sql)){
                header("Location: record.php");
                }else{
                    echo "error: ". mysqli_error($conn);
                }
            }    
        }    
     ?>
    <script>
        document.querySelectorAll('submit').addEventListener(click,(e) =>{
            e.preventDefault();
        })
    </script>
</body>
</html>