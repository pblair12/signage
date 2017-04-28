<?php echo validation_errors(); ?>

<?php echo form_open('images/update'); ?>
    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo $image['title']; ?>" /><br />
    <br/>
    <label for="full_path">Full Path</label>
    <input type="input" name="full_path" value="<?php echo $image['full_path']; ?>" /><br />
    <br/>
    <label for="uri_path">URI Path</label>
    <input type="input" name="uri_path" value="<?php echo $image['uri_path']; ?>" /><br />
    <br/>
    <input type="hidden" name="slug" value="<?php echo $image['slug']; ?>" /><br />
    <input type="hidden" name="id" value="<?php echo $image['id']; ?>" />

    <input type="submit" name="submit" value="Update Image Settings" />
</form>