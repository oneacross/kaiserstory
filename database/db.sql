SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `keiserstory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `keiserstory`;

-- -----------------------------------------------------
-- Table `keiserstory`.`polititians`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `keiserstory`.`polititians` (
  `id`  NOT NULL ,
  `name`  NULL ,
  `role`  NULL ,
  `party`  NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `keiserstory`.`media`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `keiserstory`.`media` (
  `id`  NOT NULL ,
  `source`  NULL ,
  `date`  NULL ,
  `content`  NULL ,
  `location`  NULL ,
  `polititians_id`  NOT NULL ,
  PRIMARY KEY (`id`, `polititians_id`) ,
  INDEX `fk_media_polititians` (`polititians_id` ASC) ,
  CONSTRAINT `fk_media_polititians`
    FOREIGN KEY (`polititians_id` )
    REFERENCES `keiserstory`.`polititians` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `keiserstory`.`concepts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `keiserstory`.`concepts` (
  `words`  NULL ,
  `grade`  NULL )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
