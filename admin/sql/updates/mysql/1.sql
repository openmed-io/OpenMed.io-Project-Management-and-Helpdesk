
-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Tickets
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__omhelpdesk_tickets` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`published` TINYINT(11) DEFAULT 1 ,
	`created_by` BIGINT(20) UNSIGNED ,
	`creation_date` DATETIME ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATETIME ,
	`ordering` INT(11) ,
	`title` VARCHAR(255) NOT NULL ,
	`done` TINYINT DEFAULT 0 ,
	`category` BIGINT(20) UNSIGNED ,
	`sprint` BIGINT(20) UNSIGNED ,
	`pilot` BIGINT(20) UNSIGNED ,
	`requester` BIGINT(20) UNSIGNED ,
	`description` TEXT ,
	`attachment` VARCHAR(255) ,
	`hours_of_work` FLOAT ,
	`overtime` TINYINT DEFAULT 0 ,
	`finish_date_n_time` DATETIME ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Categories
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__omhelpdesk_categories` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`published` TINYINT(11) DEFAULT 1 ,
	`category` VARCHAR(255) ,
	`desciption` VARCHAR(255) ,
	`admin` BIGINT(20) UNSIGNED ,
	`deputy_admin` BIGINT(20) UNSIGNED ,
	`modification_date` DATETIME ,
	`ordering` INT(11) ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`creation_date` DATETIME ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Sprints
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__omhelpdesk_sprints` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`published` TINYINT(11) DEFAULT 1 ,
	`sprint_name` VARCHAR(255) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Teams
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__omhelpdesk_teams` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`published` TINYINT(11) ,
	`team` VARCHAR(255) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Pilots
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__omhelpdesk_pilots` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`published` TINYINT(11) ,
	`pilots_username` BIGINT(20) UNSIGNED NOT NULL ,
	`pilots_name` VARCHAR(255) NOT NULL ,
	`team` BIGINT(20) UNSIGNED ,

	PRIMARY KEY  (`id`),
	UNIQUE KEY(pilots_username)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Departments
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__omhelpdesk_sdepartments` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`published` TINYINT(11) ,
	`department` VARCHAR(255) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Requesters
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__omhelpdesk_requestors` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`published` TINYINT(11) DEFAULT 1 ,
	`requesters_username` BIGINT(20) UNSIGNED ,
	`requesters_name` VARCHAR(255) NOT NULL ,
	`department` BIGINT(20) UNSIGNED ,
	`contact_info` TEXT ,

	PRIMARY KEY  (`id`),
	UNIQUE KEY(requesters_name)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

