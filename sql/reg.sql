CREATE TABLE IF NOT EXISTS user(
  id INT(11) NOT NULL AUTO_INCREMENT,
  ip VARCHAR(50) NULL,
  user_name VARCHAR(50) NULL,
  user_patronymic VARCHAR(50) NULL,
  user_surname VARCHAR(60) NULL,
  pass VARCHAR(60) NULL,
  mail VARCHAR(130) NULL,
  tel VARCHAR(45) NULL,
  den_rogden DATE NULL,
  data_reg INT NULL,
  status TINYINT(1) NULL DEFAULT '0',
  PRIMARY KEY (id),
  UNIQUE KEY mail(mail ASC),
  KEY ip (ip ASC)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;