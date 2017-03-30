<?php echo validation_errors(); ?>

<?php echo $error;?>

<?php echo form_open_multipart('images/create'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="title">Image File</label>
    <input type="file" name="imagefile" size="200" /><br/>

    <input type="submit" name="submit" value="Create image item" />

</form>

<p><a href="<?php echo site_url('images/'); ?>">View all images</a></p>