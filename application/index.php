<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="refresh" content="3600" />
    <style>
      body { margin: 0; padding: 0; background-color: #000; }
    </style>
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>
    <script src="./bower_components/jquery-cycle2/build/jquery.cycle2.min.js"></script>
  </head>
  <body>
    <div class="cycle-slideshow" data-cycle-speed="30000">
        <?php foreach (glob("imgs/*.jpg") as $img): ?>
            <img src="<?= $img ?>">
        <?php endforeach; ?>
    </div>
  </body>
</html>
