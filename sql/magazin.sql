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

CREATE TABLE IF NOT EXISTS mag_ustavnoy_capital(
  data INT NOT NULL,
  kapital INT NULL,
  PRIMARY KEY(data)
  )ENGINE=InnoDB DEFAULT CHARSET=utf8;

  INSERT INTO mag_ustavnoy_capital VALUES('1477344953',3120);

#############################################################################

CREATE TABLE IF NOT EXISTS mag_tovar(
  id INT(11) NOT NULL AUTO_INCREMENT,
  id_namenklatura INT,
  id_nakladnaya INT,
  zakupki_usd INT NULL,
  zakupki_nac_val INT NULL,
  dostavki_usd INT NULL,
  dostavki_nac_val INT NULL,
  sebestoimost_usd INT NULL,
  cena_prodagi INT NULL,
  data_pokupki INT NULL,
  data_prodagi INT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS mag_namenklatura(
  id INT(11) NOT NULL AUTO_INCREMENT,
  razdel VARCHAR(100) NULL,
  podrazdel VARCHAR(100) NULL,
  id_nakladnaya INT NULL,
  shtrihkod INT NULL,

  short_name VARCHAR(255) NULL,
  full_name MEDIUMTEXT NULL,
  zakupki_usd INT NULL,
  zakupki_nac_val INT NULL,
  skidka INT UNSIGNED NULL,

  brand VARCHAR(120) NULL,

  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
#####################################################################
CREATE TABLE IF NOT EXISTS mag_nakladnaya(
  id INT(11) NOT NULL AUTO_INCREMENT,
  nomer_nakladnoy VARCHAR(15)NULL,
  dostavka_usd INT NULL,
  dostavka_nac_val INT NULL,
  data INT NOT NULL,

  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DELIMITER //
CREATE TRIGGER mag_nakladnaya_cena_ins BEFORE INSERT ON mag_nakladnaya
FOR EACH ROW
  BEGIN
    IF(new.dostavka_usd IS NULL)THEN
      SET @usd=(SELECT cena FROM mag_kurs_valut WHERE valuta="usd");
      SET new.dostavka_usd=(new.dostavka_nac_val*100)/@usd;
    END IF;
  END;//

DELIMITER //
CREATE TRIGGER mag_nakladnaya_cena_upd BEFORE UPDATE ON mag_nakladnaya
FOR EACH ROW
  BEGIN
    SET @nac_val_old=old.dostavka_nac_val;
    SET @nac_val_new=new.dostavka_nac_val;

    IF(@nac_val_new IS NOT NULL)THEN
      IF(@nac_val_old!=@nac_val_new)THEN
        SET @usd=(SELECT cena FROM mag_kurs_valut WHERE valuta="usd");
        SET new.dostavka_usd=(new.dostavka_nac_val*100)/@usd;
      END IF;
    END IF;
  END;//

INSERT INTO mag_nakladnaya(id,nomer_nakladnoy,dostavka_usd,dostavka_nac_val,data)VALUES(NULL,'146130',NULL,'26','1477345000');
#####################################################################