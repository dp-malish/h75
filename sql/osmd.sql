CREATE TABLE IF NOT EXISTS main_flat(
  flat int(11) NOT NULL,
  account int(8) ZEROFILL,#лицево

  entry SMALLINT,
  floor SMALLINT,

  space_flat DECIMAL (4,2),

  tariff int(11),

  exemption tinyint(1), # льгота
  subsidy int(11),
  subsidy_ended int(11),

  PRIMARY KEY (flat)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

#DROP TABLE main_flat;
/*
DELIMITER //
CREATE TRIGGER main_flat_upd BEFORE UPDATE ON main_flat
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
*/

CREATE TABLE IF NOT EXISTS main_people(
  id int(11) NOT NULL AUTO_INCREMENT,
  flat int(11)UNSIGNED DEFAULT 0,

  tel BIGINT UNSIGNED,
  pass varchar(20),
  role INT(4),

  f varchar(30) NOT NULL,
  i varchar(20) NOT NULL,
  o varchar(20) NOT NULL,

  d_birthday TINYINT (2) ZEROFILL,
  m_birthday TINYINT (2) ZEROFILL,
  y_birthday SMALLINT(4) UNSIGNED,

  passport_serial varchar(2),
  passport_number varchar(6),

  not_lives tinyint(1),# проживает

  exemption tinyint(4), # льгота

  PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

#DROP TABLE main_people;

CREATE TABLE IF NOT EXISTS main_remont(
  id int(11) NOT NULL AUTO_INCREMENT,
  vipolnen TINYINT(1),
  opisanie TEXT,
  vid_remonta SMALLINT(4) UNSIGNED,
  smetnaya_stoimost INT,
  data int(11),
  PRIMARY KEY (id),
  KEY vipolnen (vipolnen)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

#DROP TABLE main_remont;

# справочники

#*****************************************
#*****************************************
#*****************************************
CREATE TABLE IF NOT EXISTS sp_tariff(
  id int(11) NOT NULL AUTO_INCREMENT,
  tariff int(11) NOT NULL,
  data date NOT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

#SELECT tariff FROM sp_tariff WHERE id=(SELECT MAX(id) FROM sp_tariff);

DELIMITER //
CREATE TRIGGER sp_tariff_ins BEFORE INSERT ON sp_tariff
FOR EACH ROW
  BEGIN
    SET @tariff=new.tariff;
    UPDATE main_flat SET tariff=@tariff;
  END;//

DROP TRIGGER sp_tariff_ins;
#*****************************************
#*****************************************
#*****************************************

# бухгалтерские
CREATE TABLE IF NOT EXISTS buh_flat(
  flat int(11) NOT NULL,
  month TINYINT NOT NULL,
  year SMALLINT NOT NULL,


  tariff int(11) NOT NULL,
  data date NOT NULL,
  PRIMARY KEY (flat,month,year)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
