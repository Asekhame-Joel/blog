<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
    <!-- <?php require base_path("views/partials/banner.php") ?> -->

<div class="container">
    <div class="row px-5  d-flex justify-content-center align-items-center mt-5">
    <div class="col-md-6">
        
    <div class="card px-3 py-3">
    <h2 class="text-center">Registration</h2>
<form action="/register" method="POST">
  <div class="mb-3">
     <label for="username" class="form-label">Username</label>
    <input type="username" class="form-control" name="username"id="username">
  </div>
  <div class="mb-3">
     <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <?php
echo isset($error['username']) ? $error['username'] : ''; echo "<br>";
echo isset($error['email']) ? $error['email'] : ''; echo "<br>";
echo isset($error['password']) ? $error['password'] : '';

?>
  <div class="mb-3 text-center">
  <button  type="submit" class="btn btn-primary px-5">Register</button>
  </div>


</form>
</div>
</div>
</div>
</div>




<?php require base_path("views/partials/footer.php"); ?>


