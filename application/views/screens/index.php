<p><a href="<?php echo site_url('screens/create'); ?>">Create New Screen</a></p>
<?php foreach ($screens as $screen): ?>
    <fieldset>
        <h3><?php echo $screen['title']; ?></h3>

        <?php if (!empty($screen['selected_images'])) { ?>
            <p>
                <label>Images:</label>
                <?php foreach ($screen['selected_images'] as $image): ?>
                    <span>"<?php echo $image['title']; ?>" </span>
                <?php endforeach; ?>
            </p>
        <?php } else { ?>
            <p>
                <label>Images:</label>
                <span><i>None, click edit to add some</i></span>
            </p>
        <?php } ?>
        <div class="main clearfix">
            <a href="<?php echo site_url('screens/view/'.$screen['slug']) ?>">View</a>
            <a href="<?php echo site_url('screens/edit/'.$screen['slug']) ?>">Edit</a>
            <a href="<?php echo site_url('screens/delete/'.$screen['slug']) ?>">Delete</a>
        </div>
        <br/>
    </fieldset>
<?php endforeach; ?>