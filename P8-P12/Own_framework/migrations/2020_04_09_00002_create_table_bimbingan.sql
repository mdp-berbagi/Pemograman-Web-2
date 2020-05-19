CREATE TABLE `bimbingan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int unsigned NOT NULL,
  `dosen` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL,
  `materi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci