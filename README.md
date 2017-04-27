h2 Clear Edge IT Solutions - Sinage Web App

Manages screens and images

h2 Developer Notes

This app was built using the [PHP CodeIgniter Web Framework](https://codeigniter.com/)

h3 Install dependencies

    bower install

h3 Run the app

    php -c php.ini -S localhost:8000 --ini

h3 Create the database

    CREATE TABLE `images` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `title` varchar(128) NOT NULL,
      `slug` varchar(128) NOT NULL,
      `full_path` varchar(128) NOT NULL,
      `uri_path` varchar(128) NOT NULL,
      PRIMARY KEY (`id`),
      KEY slug (slug)
    );

    CREATE TABLE `screens` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `title` varchar(128) NOT NULL,
      `slug` varchar(128) NOT NULL,
      `orientation` ENUM('horizontal', 'vertical'),
      `image_cycle_speed` int(11) DEFAULT 30000,
      PRIMARY KEY (`id`),
      KEY slug (slug)
    );

h3 TO DO
1) Associate specific images with specific screens, possibly only allow horizontal images to go on horizontal screens and same for vertical.
2) Update the app with Clear Edge style sheets.
