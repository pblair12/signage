# Sinage Web App
*Clear Edge IT Solutions, LLC*

## Description

This is a web application used to manage one or more screens (displays) that can be configured to display one or more
images.  Users are able to create, edit, delete screens and images.  Screens are configured with the images to display,
the timeout in milliseconds for showing each image, and the time in milliseconds for transitioning between images.

## Developer Notes

This app was built using the [PHP CodeIgniter Web Framework](https://codeigniter.com/)

### Install dependencies

    bower install

### Run the app

    php -c php.ini -S localhost:8000 --ini

### Create the database

    CREATE TABLE `images` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `title` varchar(128) NOT NULL UNIQUE,
      `slug` varchar(128) NOT NULL,
      `full_path` varchar(128) NOT NULL,
      `uri_path` varchar(128) NOT NULL,
      PRIMARY KEY (`id`),
      KEY slug (slug)
    );

    CREATE TABLE `screens` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `title` varchar(128) NOT NULL UNIQUE,
      `slug` varchar(128) NOT NULL,
      `orientation` ENUM('horizontal', 'vertical'),
      `image_cycle_speed` int(11) DEFAULT 30000,
      `image_cycle_timeout` int(11) DEFAULT 4000,
      PRIMARY KEY (`id`),
      KEY slug (slug)
    );

    CREATE TABLE `images_screens` (
    	`image_id` int(11) NOT NULL,
    	`screen_id` int(11) NOT NULL,
    	PRIMARY KEY (image_id, screen_id),
    	FOREIGN KEY (image_id) REFERENCES images(id) ON DELETE CASCADE,
    	FOREIGN KEY (screen_id) REFERENCES screens(id) ON DELETE CASCADE
    );

### Drop the database

**Note:** before you drop the database you should delete any uploaded images.  Use the application to delete the images or
find them in the /uploads folder within this project.

    DROP TABLE `images_screens`;

    DROP TABLE `images`;

    DROP TABLE `screens`;

### To DO

1. We are storing whether or not a screen is horizontal or vertical but we are not doing anything with that information
yet.  Also when editing a screen the orientation should be a dropdown not a text input.