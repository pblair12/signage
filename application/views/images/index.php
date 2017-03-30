<h2><?php echo $title; ?></h2>

<?php foreach ($images as $images_item): ?>

        <h3><?php echo $images_item['title']; ?></h3>
        <div class="main">
                <?php echo $images_item['path']; ?>
        </div>
        <p><a href="<?php echo site_url('images/'.$images_item['slug']); ?>">View image</a></p>

<?php endforeach; ?>