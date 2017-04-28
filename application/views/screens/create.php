<?php echo validation_errors(); ?>

<?php echo $error;?>

<?php echo form_open_multipart('screens/create'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />
    <br/>
    <label for="image_cycle_speed">Image Cycle Speed</label>
    <input type="input" name="image_cycle_speed" placeholder="30000"/><br />
    <br/>
    <label for="image_cycle_timeout">Image Cycle Timeout</label>
    <input type="input" name="image_cycle_timeout" placeholder="4000"/><br />
    <br/>
    <label for="title">Orientation</label>
    <select name="orientation">
      <option value="horizontal">Horizontal</option>
      <option value="vertical">Vertical</option>
    </select>
    <br/>
    <br/>
    <input type="submit" name="submit" value="Create Screen" />
    <br/>
</form>