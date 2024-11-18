DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies`
(
    `id`          int unsigned NOT NULL AUTO_INCREMENT,
    `title`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `genre`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `released_at` int unsigned NOT NULL DEFAULT '0',
    `created_at`  int unsigned NOT NULL DEFAULT '0',
    `updated_at`  int unsigned NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `theaters`;
CREATE TABLE `theaters`
(
    `id`         int unsigned NOT NULL AUTO_INCREMENT,
    `name`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `location`   varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` int unsigned NOT NULL DEFAULT '0',
    `updated_at` int unsigned NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales`
(
    `id`           int unsigned NOT NULL AUTO_INCREMENT,
    `theater_id`   int unsigned NOT NULL,
    `movie_id`     int unsigned NOT NULL,
    `sold_at`      int unsigned NOT NULL,
    `amount`       int unsigned NOT NULL,
    `created_at`   int unsigned NOT NULL DEFAULT '0',
    `updated_at`   int unsigned NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `ix_sales_unique_sale` (`theater_id`,`movie_id`,`sold_at`),
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE,
    FOREIGN KEY (theater_id) REFERENCES theaters(id) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
