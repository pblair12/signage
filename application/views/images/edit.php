<?php echo validation_errors(); ?>

<?php echo form_open('images/update'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo $images_item['title']; ?>" /><br />
    <br/>
    <label for="full_path">Full Path</label>
    <input type="input" name="full_path" value="<?php echo $images_item['full_path']; ?>" /><br />
    <br/>
    <label for="uri_path">URI Path</label>
    <input type="input" name="uri_path" value="<?php echo $images_item['uri_path']; ?>" /><br />
    <br/>
    <input type="hidden" name="slug" value="<?php echo $images_item['slug']; ?>" /><br />
    <input type="hidden" name="id" value="<?php echo $images_item['id']; ?>" />

    <input type="submit" name="submit" value="Update image item" />

</form>