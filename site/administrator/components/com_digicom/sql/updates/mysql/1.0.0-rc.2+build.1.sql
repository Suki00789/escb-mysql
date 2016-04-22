ALTER TABLE  `#__digicom_log`
CHANGE  `type`  `type` VARCHAR( 255 ) NOT NULL COMMENT 'download|email|purchase|status|payment';

UPDATE  `#__content_types`
SET `field_mappings` = '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"published","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"fulltext","core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access","core_params":"attribs","core_featured":"featured","core_metadata":"metadata","core_language":"language","core_images":"images","core_urls":"urls","core_version":"version","core_ordering":"ordering","core_metakey":"metakey","core_metadesc":"metadesc","core_catid":"catid","core_xreference":"xreference","asset_id":"asset_id"},"special":{"imptotal":"imptotal","impmade":"impmade","clicks":"clicks","clickurl":"clickurl","custombannercode":"custombannercode","cid":"cid","purchase_type":"purchase_type","track_impressions":"track_impressions","track_clicks":"track_clicks"}}' WHERE  `type_alias` ='com_digicom.product';
