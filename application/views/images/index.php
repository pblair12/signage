<p><a href="<?php echo site_url('images/create'); ?>">Create New Image</a></p>
<?php foreach ($images as $image): ?>
    <fieldset>
        <h3><?php echo $image['title']; ?></h3>
        <div class="main">
            <img style="max-width: auto; height: 50px" width="auto" height="50px" src="<?php echo base_url($image['uri_path']); ?>">
            <a href="<?= site_url('images/edit/'.$image['slug']); ?>">Edit</a>
            <a href="<?= site_url('images/delete/'.$image['slug']); ?>">Delete</a>
        </div>
    </fieldset>
<?php endforeach; ?>