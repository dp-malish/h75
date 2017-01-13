CREATE TABLE IF NOT EXISTS galerry_fireplace(
  id int(11) NOT NULL AUTO_INCREMENT,
  /*link varchar(255) NOT NULL,
  link_name varchar(255) NOT NULL,*/
  caption varchar(255) NOT NULL,

  img_s varchar(255) DEFAULT NULL,
  img_alt_s varchar(255) DEFAULT NULL,
  img_title_s varchar(255) DEFAULT NULL,

  short_text text NOT NULL,
  price SMALLINT NOT NULL,

  img varchar(255) DEFAULT NULL,
  img_alt varchar(255) DEFAULT NULL,
  img_title varchar(255) DEFAULT NULL,
  data date NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY link(link)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;