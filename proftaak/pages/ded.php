<?php 

require '../connection.php';

?>

<!DOCTYPE html>
<html>
    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

<header class="masthead">
  <title>Homepage</title>
  <link rel="stylesheet" type="text/css" href="pages/style.css">
  <p class="site-title">OVERZICHTSPAGINA</p>
</header><!-- .masthead -->
          
          <div class="dedmain">
            <ol>
              <?php
                $stmt = $conn->prepare("SELECT name, filename FROM posts");
                $stmt->execute();

                $rows =  $stmt->fetchAll();

                foreach($rows as $row){
                  
                  echo ('<p>' . $row["name"] . '<img class="img" src="../'. $row["filename"] . '"></p>');
                  echo ('<br>');

                }
              ?>
            </ol>
          </div>
</html>

<a target="_blank" href="' . $row["filename"] . '"><img class="img" src="'. $row["filename"] . '"></a>