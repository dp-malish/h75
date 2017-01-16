CREATE TABLE IF NOT EXISTS gallery_fireplace(
  id int(11) NOT NULL AUTO_INCREMENT,
  caption varchar(255) NOT NULL,
  img varchar(255) NOT NULL,
  img_alt varchar(255) NOT NULL,
  img_title varchar(255),
  short_text text NOT NULL,
  price SMALLINT,
  view TINYINT,
  link_turn tinyint(4),
  data date NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY img(img)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_barbecue(
  id int(11) NOT NULL AUTO_INCREMENT,
  caption varchar(255) NOT NULL,
  img varchar(255) NOT NULL,
  img_alt varchar(255) NOT NULL,
  img_title varchar(255),
  short_text text NOT NULL,
  price SMALLINT,
  view TINYINT,
  link_turn tinyint(4),
  data date NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY img(img)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_sauna(
  id int(11) NOT NULL AUTO_INCREMENT,
  caption varchar(255) NOT NULL,
  img varchar(255) NOT NULL,
  img_alt varchar(255) NOT NULL,
  img_title varchar(255),
  short_text text NOT NULL,
  price SMALLINT,
  view TINYINT,
  link_turn tinyint(4),
  data date NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY img(img)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_pool(
  id int(11) NOT NULL AUTO_INCREMENT,
  caption varchar(255) NOT NULL,
  img varchar(255) NOT NULL,
  img_alt varchar(255) NOT NULL,
  img_title varchar(255),
  short_text text NOT NULL,
  price SMALLINT,
  view TINYINT,
  link_turn tinyint(4),
  data date NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY img(img)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_marble(
  id int(11) NOT NULL AUTO_INCREMENT,
  caption varchar(255) NOT NULL,
  img varchar(255) NOT NULL,
  img_alt varchar(255) NOT NULL,
  img_title varchar(255),
  short_text text NOT NULL,
  price SMALLINT,
  view TINYINT,
  link_turn tinyint(4),
  data date NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY img(img)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_tile(
  id int(11) NOT NULL AUTO_INCREMENT,
  caption varchar(255) NOT NULL,
  img varchar(255) NOT NULL,
  img_alt varchar(255) NOT NULL,
  img_title varchar(255),
  short_text text NOT NULL,
  price SMALLINT,
  view TINYINT,
  link_turn tinyint(4),
  data date NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY img(img)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_ceiling(
  id int(11) NOT NULL AUTO_INCREMENT,
  caption varchar(255) NOT NULL,
  img varchar(255) NOT NULL,
  img_alt varchar(255) NOT NULL,
  img_title varchar(255),
  short_text text NOT NULL,
  price SMALLINT,
  view TINYINT,
  link_turn tinyint(4),
  data date NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY img(img)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_reservoirs(
  id int(11) NOT NULL AUTO_INCREMENT,
  caption varchar(255) NOT NULL,
  img varchar(255) NOT NULL,
  img_alt varchar(255) NOT NULL,
  img_title varchar(255),
  short_text text NOT NULL,
  price SMALLINT,
  view TINYINT,
  link_turn tinyint(4),
  data date NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY img(img)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;