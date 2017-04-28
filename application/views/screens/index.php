<p><a href="<?php echo site_url('screens/create'); ?>">Create New Screen</a></p>
<?php foreach ($screens as $screen): ?>
    <fieldset>
        <h3><?php echo $screen['title']; ?></h3>
        <p>
            <label>Images:</label>
            <?php foreach ($screen['selected_images'] as $image): ?>
                <i><?php echo $image['title']; ?></i>
            <?php endforeach; ?>
        </p>
        <div class="main">
            <a href="<?php echo site_url('screens/view/'.$screen['slug']) ?>">View</a>
            <a href="<?php echo site_url('screens/edit/'.$screen['slug']) ?>">Edit</a>
            <a href="<?php echo site_url('screens/delete/'.$screen['slug']) ?>">Delete</a>
        </div>
        <br/>
    </fieldset>
<?php endforeach; ?>