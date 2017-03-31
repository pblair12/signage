<p><a href="<?php echo site_url('screens/create'); ?>">Create New Screen</a></p>
<?php foreach ($screens as $screen): ?>
    <h3><?php echo $screen['title']; ?></h3>
    <div class="main">
        <a href="<?php echo site_url('screens/view/'.$screen['slug']) ?>">View</a>
        <a href="<?php echo site_url('screens/edit/'.$screen['slug']) ?>">Edit</a>
        <a href="<?php echo site_url('screens/delete/'.$screen['slug']) ?>">Delete</a>
    </div>
    <br/>
<?php endforeach; ?>