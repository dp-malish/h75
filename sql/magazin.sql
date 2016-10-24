/*CREATE TABLE IF NOT EXISTS mag_filter(
  id INT NOT NULL AUTO_INCREMENT,
  section_name VARCHAR(70) NOT NULL,
  str1 VARCHAR(70) NULL DEFAULT NULL,
  str2 VARCHAR(70) NULL DEFAULT NULL,
  str3 VARCHAR(70) NULL DEFAULT NULL,
  str4 VARCHAR(70) NULL DEFAULT NULL,
  str5 VARCHAR(70) NULL DEFAULT NULL,
  str6 VARCHAR(70) NULL DEFAULT NULL,
  str7 VARCHAR(70) NULL DEFAULT NULL,
  str8 VARCHAR(70) NULL DEFAULT NULL,
  str9 VARCHAR(70) NULL DEFAULT NULL,
  str10 VARCHAR(70) NULL DEFAULT NULL,
  bool1 VARCHAR(70) NULL DEFAULT NULL,
  bool2 VARCHAR(70) NULL DEFAULT NULL,
  bool3 VARCHAR(70) NULL DEFAULT NULL,
  int_1 VARCHAR(70) NULL DEFAULT NULL,
  `int1_kind` TINYINT(1) UNSIGNED NULL DEFAULT NULL COMMENT 'destinct || от и до',
  int_2 VARCHAR(70) NULL DEFAULT NULL,
  `int2_kind` TINYINT(1) UNSIGNED NULL DEFAULT NULL COMMENT 'destinct || от и до',
  int_3 VARCHAR(70) NULL DEFAULT NULL,
  `int3_kind` TINYINT(1) UNSIGNED NULL DEFAULT NULL COMMENT 'destinct || от и до',
  float1 VARCHAR(70) NULL DEFAULT NULL,
  `float1_kind` TINYINT(1) UNSIGNED NULL DEFAULT NULL COMMENT 'destinct || от и до',
  float2 VARCHAR(70) NULL DEFAULT NULL,
  `float2_kind` TINYINT(1) UNSIGNED NULL DEFAULT NULL COMMENT 'destinct || от и до',
  float3 VARCHAR(70) NULL DEFAULT NULL,
  `float3_kind` TINYINT(1) UNSIGNED NULL DEFAULT NULL COMMENT 'destinct || от и до',
  PRIMARY KEY (id),
  UNIQUE INDEX section_name_UNIQUE (section_name ASC))
  ENGINE = InnoDB;

INSERT INTO `mag_filter` (`id`, `section_name`, `str1`, `str2`, `str3`, `str4`, `str5`, `str6`, `str7`, `str8`, `str9`, `str10`, `bool1`, `bool2`, `bool3`, `int_1`, `int1_kind`, `int_2`, `int2_kind`, `int_3`, `int3_kind`, `float1`, `float1_kind`, `float2`, `float2_kind`, `float3`, `float3_kind`) VALUES (NULL, 'Раздел 1', 'Стр 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Бул 1', NULL, NULL, 'Инт 1', '2', NULL, NULL, NULL, NULL, 'Флоат 1', '2', NULL, NULL, NULL, NULL);*/

CREATE TABLE IF NOT EXISTS mag_kurs_valut(
  valuta VARCHAR(5) NOT NULL,
  cena INT DEFAULT NULL,
  PRIMARY KEY(valuta)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8;

  INSERT INTO mag_kurs_valut VALUES('usd', 2620);