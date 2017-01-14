CREATE TABLE IF NOT EXISTS galerry_fireplace(
  id int(11) NOT NULL AUTO_INCREMENT,
  caption varchar(255) NOT NULL,
  img varchar(255) NOT NULL,
  img_alt varchar(255) NOT NULL,
  img_title varchar(255) DEFAULT NULL,
  short_text text NOT NULL,
  price SMALLINT NOT NULL,
  data date NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY img(img)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;