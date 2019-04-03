<?php

require '../connection.php';

?>

<!DOCTYPE html>
<html>
    <!-- !$_SESSION = NOT TRUE || $_SESSION = TRUE (uitroepteken laat dat zien) -->
    <?php if ($_SESSION){ ?>
<!-- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- -->
    <header class="masthead">
        <link rel="stylesheet" type="text/css" href="../pages/style.css">
        <title>Adminpagina</title>
    </header><!-- MASTHEAD -->
<!-- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- -->
    <body>
      <div class="adminpagina"> <!-- DIT IS DE ADMINPAGINA -->
<!-- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- -->
        <div class="pagina-welkom"><h4>
            <?php 
            $str = "WELCOME"; /* DIT IS WELKOM + USERNAME */
            echo $str . "<br>" . $_SESSION['username'];
            ?>
            </h4></div>
            <!-- EINDE PAGINA-WELKOM -->
<!-- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- -->
            <div class="white"></div><!-- WHITE OPVUL -->
<!-- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- -->          
          <!-- BEGIN UPDATE -->
          <div class="update">
            <h4>Show Posts</h4>
            <?php
                  $sql = "SELECT id, name FROM posts";

                  $stmt = $conn->prepare($sql);

                  $stmt->execute();

                  $posts = $stmt->fetchAll();

              try {
                if(isset($_POST['delete'])){

                  $idee = $_POST["id"];

                  $sql = "DELETE FROM posts WHERE id = '$idee'";
                  $conn->exec($sql);
                  header('location: index.php');
                }
                
              } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
              }
                ?>
              <?php foreach ($posts as $post): ?>
                    <p><?php echo $post['name']; ?></p>
                <form method="post" action="update.php">
                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>" />
                    <button name="edit">edit</button>
                </form>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>" />
                    <button name="delete">delete</button>
                </form>
              <?php endforeach; ?>
          </div>
          <!-- EINDE UPDATE -->
<!-- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- -->
          <!-- BEGIN CREATE -->
          <div class="create"><h4>CREATE</h4>
              <?php
                try{
                  if(isset($_POST['btn'])){
                    $tmp_name = $_FILES["myfile"]["tmp_name"];

                    $filename = basename($_FILES["myfile"]["name"]);
                    echo $filename." ";
                    $naam = $_POST["naam"];
                    $page = $_POST["page"];
                    $omschrijving = $_POST["description"];
                    move_uploaded_file($tmp_name, "uploads/files/".$filename);

                    $sql = "INSERT INTO posts (filename, name, page_id, description) VALUES ('admin/uploads/files/$filename', '$naam', '$page', '$omschrijving')";
                    $conn->exec($sql);
                    echo "New record created successfully";
                    }
                  }
                catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                }
              ?>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="myfile"/><input type="text" name="naam"><br>
                <?php
                  $sql = "SELECT id, name FROM pages";

                  $stmt = $conn->prepare($sql);

                  $stmt->execute();

                  $pages = $stmt->fetchAll();
                ?><br>
                <textarea rows="4" cols="50" name="description">Voer hier een beschrijving toe...</textarea><br>
                
                <select name="page">
                <?php foreach ($pages as $page): ?>
                  <option value="<?= $page['id']; ?>"><?= $page['name']; ?></option>
                <?php endforeach; ?>
                </select>
                <br>
              <button name="btn">Upload file</button>
            </form>
            <p></p>
            <!-- <form action="../pages/create.php" method="post" autocomplete="off">
              <input type="text" name="titel" placeholder="Titel"><br>
                <textarea rows="5" cols="60" name="content" placeholder="Inhoud"></textarea><br>
              <input type="submit" value="Voeg artikel toe">
            </form> -->
          </div>
          <!-- EINDE CREATE -->
<!-- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- -->
          <div class="delete"><h4>DELETE</h4></div><!-- DELETE -->
<!-- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- -->
          <div class="overig"><h4>OVERIG</h4>







          </div><!-- OVERIG -->
<!-- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- -->
          <div class="white2"></div><!-- WHITE2 OPVUL -->
<!-- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- -->
        <div class="footer"><a href="../logout.php"><h4>CLICK HERE TO LOGOUT THIS SESSION</h4></a></div>
<!-- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- --  -- -->
      </div>
    </body>
    <?php } else {
        header('location: ../login.php');
    } ?>
</html>
