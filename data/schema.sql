-- Create syntax for TABLE 'musicians'
CREATE TABLE `musicians` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logo_media_id` int(11) DEFAULT NULL,
  `name` varchar(250) NOT NULL DEFAULT '',
  `description` text,
  `url` varchar(250) DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `is_published` (`is_published`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'record_labels'
CREATE TABLE `record_labels` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logo_media_id` int(11) DEFAULT NULL,
  `name` varchar(250) NOT NULL DEFAULT '',
  `description` text,
  `url` varchar(250) DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `is_published` (`is_published`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'record_labels_records'
CREATE TABLE `record_labels_records` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `record_label_id` int(11) unsigned NOT NULL,
  `record_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `record_label_id` (`record_label_id`,`record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'records'
CREATE TABLE `records` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `musician_id` int(11) unsigned NOT NULL,
  `cover_media_id` int(11) DEFAULT NULL,
  `title` varchar(250) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `is_published` tinyint(1) DEFAULT '0',
  `formats` varchar(250) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `is_published` (`is_published`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;