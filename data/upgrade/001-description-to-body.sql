ALTER TABLE `musicians` CHANGE `description` `body` TEXT  NULL;
ALTER TABLE `record_labels` CHANGE `description` `body` TEXT  NULL;
ALTER TABLE `records` CHANGE `description` `body` TEXT  NOT NULL;
