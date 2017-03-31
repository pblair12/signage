Install dependencies

    bower install

Run the app

    php -c php.ini -S localhost:8000 --ini

Create the database

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
