CREATE TABLE IF NOT EXISTS `category`(
    `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO `category` (`name`) VALUES ('Muzyka polska'), ('Muzyka zagraniczna');