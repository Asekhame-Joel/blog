<nav class="navbar navbar-dark bg-primary navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">JBlog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item px-2">
          <a class="<?= Url('/') ? "nav-link active" : "nav-link" ?>" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item px-2">
          <a class="<?= Url('/about') ? "nav-link active" : "nav-link" ?>" href="/about">About</a>
        </li>
        <li class="nav-item px-2">
          <a class="<?= Url('/contact') ? "nav-link active" : "nav-link" ?>" href="/contact">Contact</a>
        </li>
        <?php //if ($_SESSION['user'] ?? false) : ?>
        <li class="nav-item px-2">
          <a class="<?= Url('/posts') ? "nav-link active" : "nav-link" ?>" href="/posts">Blog</a>
        </li>
        <!-- <?php// endif; ?> -->
      </ul>
    </div>
    <?php if (isset($_SESSION['user'])){ ?>
    <div class="text-light px-3">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
</svg>
</div>
<div>  
<form  action="/logout" method="POST" class="text-white">
  <input type="hidden" method="_method" value="DELETE">
<button class="ps-2">Logout</button>

</form>  

<?php }else{ ?>
  <a href="/register" class="text-white">Register</a>
  <div>  <a class="py-3 px-3" href="/login" class="text-white underline-none">Login</a></div>
<?php } ?>
  </div>
</nav>
