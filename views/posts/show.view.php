<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<div>
</div>
<div class="main-body">
   <P class="px-3">
    <a href="/posts">Go Back</a>
    </P> 
<ul>
<li>
Title: <?php echo htmlspecialchars($post['title']) ?>
</li><br>
<li>
Content: <?php echo htmlspecialchars($post['body']) ?> 
</li>
 </ul>
 <div class="px-4 flex items-center">
 <?php if ($_SESSION['user'] ?? false) : ?>
    <!-- Form -->
    <form method="POST" style="display: inline-block; margin-right: 10px;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="submit" value="<?= $post['id'] ?>">
        <button class="btn btn-primary">Delete</button>
    </form>

    <!-- Button -->
    <a href="/posts/edit?id=<?= $post['id'] ?>" style="display: inline-block;">
        <div class="px-4 py-3">
            <button type="button" class="btn btn-primary">Edit</button>
        </div>
    </a> 
    <?php endif; ?>
</div>

 
 <?php require base_path("views/partials/footer.php"); ?>


