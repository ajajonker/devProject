<?php

require '../connection.php';

?>

<?php

if(isset($_POST['update'])){
	$name = $_POST['name'];
	$id = $_POST['id'];
	$pageid = $_POST['page'];
	$omschrijving = $_POST['description'];

		$data = [
		    'name' => $name,
		    'id' => $id,
		    'page' => $pageid,
		    'tekst' => $omschrijving
		];
		$sql = "UPDATE posts SET name=:name, page_id=:page, description=:tekst WHERE id=:id";
		$stmt= $conn->prepare($sql);
		$stmt->execute($data);


	header('location: index.php');

}

?>





  <?php
    try{
    if(isset($_POST['edit'])){
    
      $id = $_POST['id'];

      // echo $id;
    
      $sql = "SELECT id, name, page_id, description FROM posts WHERE id=$id";


      $stmt = $conn->prepare($sql);

      $stmt->execute();

      $post = $stmt->fetch();


      }
    }
      catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

?>
     <form method="post">
     	<input type="hidden" name="id" value="<?php echo $post['id'] ?>">

        <input name="name" value="<?php echo $post['name'] ?>">

        <textarea rows="4" cols="50" name="description"><?php echo $post['description'] ?></textarea>

        <button name="update" type="submit">Update</button>
				
				<?php
                  $sql = "SELECT id, name FROM pages";

                  $stmt = $conn->prepare($sql);

                  $stmt->execute();

                  $pages = $stmt->fetchAll();
                ?>
			<select name="page">
				<option selected="selected" value="<?php echo $post['page_id']; ?>">Selected</option>
                <?php foreach ($pages as $page): ?>
                  <option value="<?= $page['id']; ?>"><?= $page['name']; ?></option>
                <?php endforeach; ?>
            </select>

      </form>
