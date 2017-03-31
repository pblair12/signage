<?php foreach ($images as $images_item): ?>
    <h3><?php echo $images_item['title']; ?></h3>
    <div class="main">
        <?php echo $images_item['path']; ?>
        <a href="<?php echo site_url('images/edit/'.$images_item['slug']); ?>">Edit</a>
        <a href="<?php echo site_url('images/delete/'.$images_item['slug']); ?>">Delete</a>
    </div>
<?php endforeach; ?>