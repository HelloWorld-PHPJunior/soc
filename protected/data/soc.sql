-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(300) NOT NULL,
  `last_name` VARCHAR(300) NOT NULL,
  `nickname` VARCHAR(250) NULL,
  `password` VARCHAR(32) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(16) NULL,
  `address` VARCHAR(500) NULL,
  `gender` ENUM('M','F') NOT NULL,
  `birthdate` DATE NOT NULL,
  `about` TEXT NULL,
  `created_at` DATETIME NOT NULL,
  `last_login_at` DATETIME NULL,
  `last_login_from` VARCHAR(15) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `user_friend`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_friend` (
  `user_from_id` INT UNSIGNED NOT NULL,
  `user_to_id` INT UNSIGNED NOT NULL,
  `accepted` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_from_id`, `user_to_id`),
  INDEX `fk_user_friend_user1_idx` (`user_to_id` ASC),
  CONSTRAINT `fk_user_friend_user`
    FOREIGN KEY (`user_from_id`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_friend_user1`
    FOREIGN KEY (`user_to_id`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `message` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_from_id` INT UNSIGNED NOT NULL,
  `user_to_id` INT UNSIGNED NOT NULL,
  `subject` VARCHAR(300) NULL,
  `body` TEXT NOT NULL,
  `readed` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`, `user_from_id`, `user_to_id`),
  INDEX `fk_message_user1_idx` (`user_from_id` ASC),
  INDEX `fk_message_user2_idx` (`user_to_id` ASC),
  CONSTRAINT `fk_message_user1`
    FOREIGN KEY (`user_from_id`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_user2`
    FOREIGN KEY (`user_to_id`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;