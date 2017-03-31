<?php echo validation_errors(); ?>

<?php echo form_open('screens/update'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo $screen['title']; ?>" /><br />
    <br/>
    <label for="image_cycle_speed">Image Cycle Speed</label>
    <input type="input" name="image_cycle_speed" value="<?php echo $screen['image_cycle_speed']; ?>" /><br />
    <br/>
    <label for="orientation">Orientation</label>
    <input type="input" name="orientation" value="<?php echo $screen['orientation']; ?>" /><br />
    <br/>
    <input type="hidden" name="slug" value="<?php echo $screen['slug']; ?>" /><br />
    <input type="hidden" name="id" value="<?php echo $screen['id']; ?>" />

    <input type="submit" name="submit" value="Update screen item" />

</form>