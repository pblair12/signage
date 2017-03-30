Install dependencies

    bower install

Run the app

    php -c php.ini -S localhost:8000 --ini

Create the database

    CREATE TABLE `images` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `title` varchar(128) NOT NULL,
      `slug` varchar(128) NOT NULL,
      `path` varchar(128) NOT NULL,
      PRIMARY KEY (`id`),
      KEY slug (slug)
    )
