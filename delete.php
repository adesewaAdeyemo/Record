<?php
    $content="Records deleted cannot be recovered!</br>";
    $content.="Do you want to continue?<br>";
    $content.= "<input type='radio' name='approve' value='Yes'>Yes<br><input type='radio' name='approve' value='No'>No<br>";
    $content.= "<input type='submit' name='confirm' value='Confirm'>";
    $_id='';
    $error='';
    $count=0;
    if (isset($_POST['confirm']) && !empty($_POST['approve'])){
        if ($_POST['approve'] === 'No'){
            header("Location: record.php");
        }else{
            $content="<legend>Enter the unique ID of the record row to be deleted...<legend>";
            $content.= "<input type='text' name='record_id' max='10' value='". $_id ."'>";
            $content.= "<input type='submit' name='confirmid' id='confirmid' value='Confirmid'>";
        }
    }
    if (isset($_POST['confirmid'])){
        if(!empty($_POST['record_id'])){
            $_id= $_POST['record_id'];
            if (!is_numeric($_POST['record_id'])){
                $error= "Invalid ID";
                $count+=1;
                if ($count === 3){
                    header("Location: record.php");
                }
            }else{
                include("conn.php");
                $query="SELECT * FROM highlife WHERE id = $_id";
                $qresult= mysqli_query($conn, $query);
                $qrow = mysqli_fetch_assoc($qresult);
                if ($_id !== $qrow['id']){
                    $error = "Id does not exist";
                }else{
                    $sql= "DELETE FROM highlife WHERE id=$_id";
                    if(mysqli_query($conn, $sql)){
                            $content="<strong>Record permanently deleted</strong>". $_id;
                            $content.='<table border="1"><tr><td>'. $qrow['id'] .'</td><td>'. $qrow['song_name'] .'</td><td>'. $qrow['artist'] .'</td><td><center>'. $qrow['band_id'] .'</center></td><td><center>'. $qrow['rating'] .'</center></td></tr></table>';
                            $content.="<button type='submit' style='backgroud-color:#04f4f4; border:transparent; width=:40%; color:rgb(97, 93, 93); padding:10px 15px;margin-top:10px;'><a href='record.php' style='text-decoration:none; color:#fff;'>Ok</a></button>";
                    }else{
                        $error = "error: ". mysqli_error($conn);
                        echo 'id= '. $_id;
                        return false;
                    }
                }        
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
    <title>Delete Record</title>
    <link rel="stylesheet" href="record.css">
</head>
<body>
    <?php
    include("nav.php");
    include("content.php");
?>
        <script>
        document.querySelectorAll('submit').addEventListener(click,(e) =>{
            e.preventDefault();
        })
        document.querySelector('#confirmid').addEventListener(click, func);
        function func(){
            e.preventDefault();
            alert("Delete record permanently");
        }

    </script>

</body>
</html>