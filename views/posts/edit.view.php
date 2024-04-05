<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<div>
</div>
<div class="main-body bg-secondary">
    <div class="container ">
        <form action="/post" method="POST">
          <input type="hidden" name="_method" value="UPDATE">
          <input type="hidden" name="id" value="<?= $post['id']?>">

<div class="mb-3">
  <label for="title" class="form-label"></label>
  <textarea type="text" class="form-control" name="title" rows="1" id="title" placeholder="Post Title">
  <?php echo isset($_POST['title']) ? $_POST['title'] : '';  ?>
  <?php   echo $post['title']; ?> 
       
  </textarea>

</div>

<div class="mb-3">
  <label for="body" class="form-label"></label>
  <textarea class="form-control" id="body" name="body" rows="5" placeholder="Post Content">
    <?php echo isset($_POST['body']) ? $_POST['body'] : ''; ?>
    <?php   echo $post['body']; ?> 

  </textarea>
</div>
<div> <?php
echo isset($error['title']) ? $error['title'] : ''; echo "<br>";
echo isset($error['body']) ? $error['body'] : '';
?>
</div>

<div class="py-3">
    <a href=""><button name="" type="submit" class="btn btn-primary px-4">Update</button>
</a>

<button type="button" class="btn btn-dark px-4 ms-4">Cancel</button>

</div>
</form>

</div>



<?php require base_path("views/partials/footer.php"); ?>


