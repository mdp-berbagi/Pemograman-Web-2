CREATE TABLE `test`.`new_table` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `npm` VARCHAR(10) NOT NULL,
  `nama` VARCHAR(45) NOT NULL,
  `jk` ENUM('L', 'P') NOT NULL,
  `tempat_lahir` VARCHAR(45) NOT NULL,
  `tanggal_lahir` DATE NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `npm_UNIQUE` (`npm` ASC) VISIBLE)
;