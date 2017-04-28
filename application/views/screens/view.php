<div class="cycle-slideshow" data-cycle-speed="<?= $screen['image_cycle_speed']; ?>">
    <?php foreach ($selected_images as $image): ?>
        <img src="<?php echo base_url($image['uri_path']); ?>">
    <?php endforeach; ?>
</div>