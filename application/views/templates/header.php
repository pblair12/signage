<html>
    <head>
        <title>Signage</title>
    </head>
    <body>
        <span><a href="<?php echo site_url('images/'); ?>">Manage Images</a></span>
        <span><a href="<?php echo site_url('images/create'); ?>">Upload image</a></span>
        <span><a href="<?php echo site_url('screens'); ?>">Manage Screens</a></span>
        <h1><?php if (!empty($title)) echo $title; ?></h1>