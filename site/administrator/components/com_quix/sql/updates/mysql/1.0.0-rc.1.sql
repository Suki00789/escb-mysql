DROP TABLE IF EXISTS `#__quix_elements`;

ALTER TABLE  `#__quix` 
ADD `catid` int(11) NOT NULL AFTER  `title`,
ADD `version` int(10) unsigned NOT NULL DEFAULT '1' AFTER `params`,
ADD `hits` int(11) NOT NULL AFTER `version`,
ADD `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.' AFTER `hits`,
ADD INDEX `idx_access` (`access`),
ADD INDEX `idx_catid` (`catid`),
ADD INDEX `idx_state` (`state`),
ADD INDEX `idx_createdby` (`created_by`),
ADD INDEX `idx_xreference` (`xreference`);
