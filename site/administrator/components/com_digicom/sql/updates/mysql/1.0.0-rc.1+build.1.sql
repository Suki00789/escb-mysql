# this is a short databse update for better log or stats report

ALTER TABLE  `#__digicom_orders_details` 
CHANGE `expires`  `update` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;

ALTER TABLE  `#__digicom_log` 
ADD `callbackid` INT NULL DEFAULT NULL COMMENT  'orderid | fileid ; quickid to find items' AFTER  `callback` ;

ALTER TABLE  `#__digicom_orders` 
ADD `update_date` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER  `comment` ;

ALTER TABLE  `#__digicom_products` 
CHANGE  `publish_down`  `publish_down` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00',
CHANGE  `publish_up`  `publish_up` DATETIME NOT NULL DEFAULT  '0000-00-00 00:00:00',
ADD `version` int(10) unsigned NOT NULL DEFAULT '1' AFTER  `xreference`,
ADD `urls` text NOT NULL AFTER  `version`,
ADD INDEX  `idx_access` (  `access` ),
ADD INDEX  `idx_checkout` (  `checked_out` ),
ADD INDEX  `idx_state` (  `published` ),
ADD INDEX  `idx_catid` (  `catid` ),
ADD INDEX  `idx_createdby` (  `created_by` ),
ADD INDEX  `idx_featured_catid` (`featured`,`catid`),
ADD INDEX  `idx_language` (`language`),
ADD INDEX  `idx_xreference` (`xreference`);


UPDATE  `#__content_types` 
SET  `table` = '{"special":{"dbtable":"#__digicom_products","key":"id","type":"product","prefix":"Table","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}' WHERE `type_alias` ='com_digicom.product',
SET  `field_mappings` = '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"published","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"fulltext","core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access","core_params":"attribs","core_featured":"featured","core_metadata":"metadata","core_language":"language","core_images":"images","core_urls":"urls","core_version":"version","core_ordering":"ordering","core_metakey":"metakey","core_metadesc":"metadesc","core_catid":"catid","core_xreference":"xreference","asset_id":"asset_id"},"special":{"imptotal":"imptotal","impmade":"impmade","clicks":"clicks","clickurl":"clickurl","custombannercode":"custombannercode","cid":"cid","purchase_type":"purchase_type","track_impressions":"track_impressions","track_clicks":"track_clicks"}}' WHERE  `type_alias` ='com_digicom.product',
SET `content_history_options` = '{"formFile":"administrator\\/components\\/com_digicom\\/models\\/forms\\/product.xml","hideFields":["checked_out","checked_out_time","version","reset"],"ignoreChanges":["modified_by","modified","checked_out","checked_out_time","version","imptotal","impmade","reset"],"convertToInt":["publish_up","publish_down","ordering"],"displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}' WHERE `type_alias` ='com_digicom.product',
SET  `table` = '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"Table","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}' WHERE  `type_alias` ='com_digicom.category',
SET  `field_mappings` = '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description","core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access","core_params":"params","core_featured":"null","core_metadata":"metadata","core_language":"language","core_images":"null","core_urls":"null","core_version":"version","core_ordering":"null","core_metakey":"metakey","core_metadesc":"metadesc","core_catid":"parent_id","core_xreference":"null","asset_id":"asset_id"},"special":{"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}' WHERE `type_alias` ='com_digicom.category',
SET  `content_history_options` = '{"formFile":"administrator/components/com_digicom/models/forms/category.xml","hideFields":["asset_id","checked_out","checked_out_time","version","lft","rgt","level","path","extension"],"ignoreChanges":["modified_user_id","modified_time","checked_out","checked_out_time","version","hits","path"],"convertToInt":["publish_up","publish_down"],"displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"parent_id","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}]}' WHERE `type_alias` ='com_digicom.category';
