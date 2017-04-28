<?php echo validation_errors(); ?>

<?php echo form_open('screens/update'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo $screen['title']; ?>" /><br />
    <br/>
    <label for="image_cycle_speed" title="The speed of the transition effect in milliseconds.">Image Cycle Speed</label>
    <input type="input" name="image_cycle_speed" value="<?php echo $screen['image_cycle_speed']; ?>" /><br />
    <br/>
    <label for="image_cycle_timeout" title="The time between slide transitions in milliseconds.">Image Cycle Timeout</label>
    <input type="input" name="image_cycle_timeout" value="<?php echo $screen['image_cycle_timeout']; ?>" /><br />
    <br/>
    <label for="orientation">Orientation</label>
    <input type="input" name="orientation" value="<?php echo $screen['orientation']; ?>" /><br />
    <br/>
    <input type="hidden" name="slug" value="<?php echo $screen['slug']; ?>" /><br />
    <input type="hidden" name="id" value="<?php echo $screen['id']; ?>" />

    <input type="submit" name="submit" value="Update screen item" />

    <h3>Available Images</h3>
    <?php foreach ($available_images as $image): ?>
        <label><?php echo $image['title']; ?></label>
        <div class="main">
            <img width="auto" height="50px" src="<?php echo base_url($image['uri_path']); ?>">
            <a href="<?= site_url('images_screens/create/'.$image['id'].'/'.$screen['id']); ?>">Add</a>
        </div>
    <?php endforeach; ?>

    <h3>Selected Images</h3>
    <?php foreach ($selected_images as $image): ?>
        <label><?php echo $image['title']; ?></label>
        <div class="main">
            <img width="auto" height="50px" src="<?php echo base_url($image['uri_path']); ?>">
            <a href="<?= site_url('images_screens/delete/'.$image['id'].'/'.$screen['id']); ?>">Remove</a>
        </div>
    <?php endforeach; ?>
</form>