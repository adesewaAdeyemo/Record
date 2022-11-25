<!-- <?php
    // $i=0;
    // while($i < 10){
    //     echo "my$i";
    //     $i++;
    // }
    // if (isset($_POST["it"])){
    //     $i=0;
    //     foreach ($_POST['it'] as $ite){
    //         $i++;    
    //     echo"submited";
    //     foreach ($POST['item'] as $me)
    //     echo "first value: ". $item;
    //     echo "second value: item$i[2]";
    //     echo "third value: item$i[2]";
    // }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="POST">
        <?php $i=0;
        // while ($i < 10){        ?>
        <input type="text" name="item[]" value="<?php echo $i; ?>">
        <input type="text" name="item[]" value="<?php echo $i; ?>">
        <input type="text" name="item[]" value="<?php echo $i; ?>">
        <input type="hidden" name="check" value="<?php echo $i; ?>">
        <input type="submit" name="it[]" value="submit">
        <?php 
        $i++;


        include('conn.php');
        $que="SELECT id FROM highlife";
        $count= mysqli_query($conn, $que);
        
        foreach($count as $_id){
            print_r($_id);


        
    } ?>
    </form>
</body>
</html> -->
