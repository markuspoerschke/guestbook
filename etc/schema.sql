CREATE TABLE IF NOT EXISTS `guestbook_entry` (
  `author_name` VARCHAR(255) NOT NULL,
  `author_email` VARCHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  `created_at` DATETIME NOT NULL)
ENGINE = InnoDB;
