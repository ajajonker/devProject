
<?php

require '../pages/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Add items page</title>
  <link rel="stylesheet" type="text/css" href="../pages/style.css">
</head>
<body>

  <div class="upload"><h4>Upload image</h4>
    <?php
        try{
            if(isset($_POST['addimage'])){
              $tmp_name = $_FILES["myfile"]["tmp_name"];

              $filename = basename($_FILES["myfile"]["name"]);
              echo $filename." ";
              $name = $_POST["name"];
              move_uploaded_file($tmp_name, "uploads/images/".$filename);

              $sql = "INSERT INTO images (filename, name) VALUES ('/uploads/images/$filename', '$name')";
              $conn->exec($sql);
              echo "New image upload successful";
              }
            }
              catch(PDOException $e)
              {
              echo $sql . "<br>" . $e->getMessage();
              }
          ?>
      <form method="post" enctype="multipart/form-data">
          <input type="file" name="myfile"/><input type="text" name="name"><br>
        <button name="addimage">Voeg afbeelding toe</button>  
      </form>
  </div>
    <br>

    <div class="quote"><h4>Upload quote</h4>
      <?php
        try {
          if(isset($_POST['addquote'])){

        $quote = $_POST["quote"];
        $image = $_POST["image"];

          $sql = "INSERT INTO quotes (quote, image_id) VALUES ('$quote', '$image')";
                $conn->exec($sql);
                echo "New quote upload successful";
          }
        }

        catch(PDOException $e)
              {
              echo $sql . "<br>" . $e->getMessage();
              }
      ?>
      <form method="post" enctype="multipart/form-data">
          <textarea rows="4" cols="50" name="quote">Voer hier een quote in...</textarea><br>
              <?php
                $sql = "SELECT id, name FROM images";

                $stmt = $conn->prepare($sql);

                $stmt->execute();

                $images = $stmt->fetchAll();
              ?><br>
            <select name="image">
            <?php foreach ($images as $image): ?>
              <option value="<?= $image['id']; ?>"><?= $image['name']; ?></option>
            <?php endforeach; ?>
            </select>
            <br>
          <button name="addquote">Voeg quote toe</button>
        </form>
    </div>

</body>
</html>