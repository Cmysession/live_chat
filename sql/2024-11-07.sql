ALTER TABLE `live_room` ADD COLUMN `live_area_uuid` varchar(50) COLLATE utf8_unicode_ci NOT NULL;
ALTER TABLE `live_room` ADD KEY ( `live_area_uuid` );
