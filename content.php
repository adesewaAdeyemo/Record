<?php
    echo '<center>';?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
    <?php echo "<p class='content'>". $content ."<p>";
    echo "<div class='hero-error'>". $error ."</div>";
    echo "</form>";
    echo '</center>';
?>
