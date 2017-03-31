<div class="cycle-slideshow" data-cycle-speed="30000">
    <?php foreach (glob("uploads/*.jpg") as $img): ?>
        <img src="<?php echo base_url($img); ?>">
    <?php endforeach; ?>
</div>