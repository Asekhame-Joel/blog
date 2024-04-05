<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<div>
<h3 class="px-3">Welcome to the <?php echo $heading ?> Page</h3>
</div>
<div class="main-body">
<ul>
<?php
 foreach ($posts as $post){ ?>
<li>
    <a href="/post?id=<?= $post['id'] ?>">
    <?php echo htmlspecialchars($post['title'])?> 
</a>
</li>
 <?php }?>
 </ul>
 <?php if ($_SESSION['user'] ?? false) : ?>

 <p class="px-3">
    <a href="/posts/create">
    <div class="px-4 py-3">
<button type="button" class="btn btn-primary">Create</button>
</div>    </a> 
</p>
<?php endif; ?>

<?php require base_path("views/partials/footer.php"); ?>


