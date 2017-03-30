<?php foreach ($images as $images_item): ?>
    <h3><?php echo $images_item['title']; ?></h3>
    <div class="main">
        <?php echo $images_item['path']; ?>
        <a href="<?php echo site_url('images/'.$images_item['slug']); ?>">View</a>
        <a href="<?php echo site_url('images/edit/'.$images_item['slug']); ?>">Edit</a>
    </div>
<?php endforeach; ?>

<p><a href="<?php echo site_url('images/create'); ?>">Upload image</a></p>