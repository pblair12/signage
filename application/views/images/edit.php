<?php echo validation_errors(); ?>

<?php echo form_open('images/update'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo $images_item['title']; ?>" /><br />

    <label for="path">Path</label>
    <input type="input" name="path" value="<?php echo $images_item['path']; ?>" /><br />

    <input type="hidden" name="slug" value="<?php echo $images_item['slug']; ?>" /><br />
    <input type="hidden" name="id" value="<?php echo $images_item['id']; ?>" /><br />

    <input type="submit" name="submit" value="Update image item" />

</form>