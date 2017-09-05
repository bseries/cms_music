ALTER TABLE `musicians` CHANGE `description` `body` TEXT  CHARACTER SET utf8  COLLATE utf8_general_ci  NULL;
ALTER TABLE `record_labels` CHANGE `description` `body` TEXT  CHARACTER SET utf8  COLLATE utf8_general_ci  NULL;
ALTER TABLE `records` CHANGE `description` `body` TEXT  CHARACTER SET utf8  COLLATE utf8_general_ci  NOT NULL;
