<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('images/create'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="path">Path</label>
    <input type="input" name="path" /><br />

    <input type="submit" name="submit" value="Create image item" />

</form>