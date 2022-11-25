<?php 


        include('conn.php');
        $que="SELECT id FROM highlife";
        $count= mysqli_query($conn, $que);
        // print_r($count);
        foreach($count as $_id){
            // print_r($_id);
            echo "<br>";
            echo $_id['id'];

    } ?>
