CREATE TABLE IF NOT EXISTS main_flat(
  flat int(11) NOT NULL AUTO_INCREMENT,
  account int(8) ZEROFILL,#лицево

  entry SMALLINT,
  floor SMALLINT,

  space_flat DECIMAL (4,2),
  exemption tinyint(1), # льгота
  subsidy int(11),
  PRIMARY KEY (flat)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

#DROP TABLE main_flat;

CREATE TABLE IF NOT EXISTS main_people(
  id int(11) NOT NULL AUTO_INCREMENT,
  flat int(11) NOT NULL,

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

DROP TABLE main_people;

CREATE TABLE IF NOT EXISTS sp_tariff(
  id int(11) NOT NULL AUTO_INCREMENT,
  tariff int(11) NOT NULL,
  data date NOT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;