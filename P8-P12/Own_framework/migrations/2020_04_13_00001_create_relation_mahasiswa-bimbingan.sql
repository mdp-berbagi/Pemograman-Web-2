ALTER TABLE `mahasiswa` 
CHANGE COLUMN `id` `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ;

ALTER TABLE `bimbingan` 
ADD INDEX `relasi_mahasiswa_idx` (`id_mahasiswa` ASC) VISIBLE;

ALTER TABLE `bimbingan` 
ADD CONSTRAINT `relasi_mahasiswa`
  FOREIGN KEY (`id_mahasiswa`)
  REFERENCES `mahasiswa` (`id`)
  ON DELETE RESTRICT
  ON UPDATE CASCADE;

