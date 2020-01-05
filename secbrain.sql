# Host: localhost  (Version: 5.5.53)
# Date: 2020-01-05 21:41:29
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "core"
#

CREATE TABLE `core` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` int(11) unsigned DEFAULT NULL,
  `update_time` int(11) unsigned DEFAULT NULL,
  `is_delete` bit(1) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='data base';

#
# Structure for table "master"
#

CREATE TABLE `master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `core_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `master_core` (`core_id`),
  CONSTRAINT `master_core` FOREIGN KEY (`core_id`) REFERENCES `core` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='主人';

#
# Structure for table "category"
#

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `core_id` int(11) DEFAULT NULL,
  `master_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `describe` varchar(255) DEFAULT NULL,
  `level` tinyint(3) DEFAULT NULL,
  `father_id` tinyint(3) DEFAULT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1' COMMENT '分类是否展示1是0否',
  PRIMARY KEY (`id`),
  KEY `category_core` (`core_id`),
  KEY `category_master` (`master_id`),
  CONSTRAINT `category_core` FOREIGN KEY (`core_id`) REFERENCES `core` (`id`),
  CONSTRAINT `category_master` FOREIGN KEY (`master_id`) REFERENCES `master` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='分类';

#
# Structure for table "memory"
#

CREATE TABLE `memory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `core_id` int(11) DEFAULT NULL,
  `master_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `describe` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `memory_core` (`core_id`),
  KEY `memory_master` (`master_id`),
  CONSTRAINT `memory_core` FOREIGN KEY (`core_id`) REFERENCES `core` (`id`),
  CONSTRAINT `memory_master` FOREIGN KEY (`master_id`) REFERENCES `master` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='主体内容';

#
# Structure for table "memory_tag"
#

CREATE TABLE `memory_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memory_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_memory` (`memory_id`),
  KEY `tag_category` (`category_id`),
  CONSTRAINT `tag_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `tag_memory` FOREIGN KEY (`memory_id`) REFERENCES `memory` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
