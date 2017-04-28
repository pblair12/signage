<?php echo validation_errors(); ?>

<?php echo $error;?>

<?php echo form_open_multipart('images/create'); ?>
    <label for="title">Title</label>
    <input type="input" name="title" /><br />
    <br/>
    <label for="title">File</label>
    <input type="file" name="imagefile" /><br/>
    <br/>
    <input type="submit" name="submit" value="Create Image" />
</form>