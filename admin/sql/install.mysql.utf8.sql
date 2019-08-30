DROP TABLE IF EXISTS `kesra__programmes`;

CREATE TABLE `kesra__programmes` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(250),
    `description` VARCHAR(1000),
	`published` tinyint(4) NOT NULL DEFAULT '1',
    `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) 
	ENGINE=InnoDB 
    DEFAULT CHARSET=utf8mb4 
    DEFAULT COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `kesra__courses`;

CREATE TABLE `kesra__courses` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
    `programme_id` int(11), 
	`title` VARCHAR(250) ,
    `description` VARCHAR(1000) NOT NULL,
	`document` VARCHAR(1000),
	`duration` INT(10),
	`studymode` VARCHAR(1000) NOT NULL,
	`campus` VARCHAR(1000) NOT NULL,
	`published` tinyint(4) NOT NULL DEFAULT '1',
    `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
	ENGINE=InnoDB 
    DEFAULT CHARSET=utf8mb4 
    DEFAULT COLLATE=utf8mb4_unicode_ci;