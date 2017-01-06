CREATE TABLE IF NOT EXISTS article(
  id int(11) NOT NULL AUTO_INCREMENT,
  link varchar(255) NOT NULL,
  title varchar(255) NOT NULL,
  caption varchar(255) NOT NULL,
  meta_d varchar(255) NOT NULL,
  meta_k varchar(255) NOT NULL,
  data date NOT NULL,
  img_i varchar(255) DEFAULT NULL,
  img_alt_i varchar(255) DEFAULT NULL,
  img_title_i varchar(255) DEFAULT NULL,
  index_text text,
  img_s varchar(255) DEFAULT NULL,
  img_alt_s varchar(255) DEFAULT NULL,
  img_title_s varchar(255) DEFAULT NULL,
  short_text text NOT NULL,
  img varchar(255) DEFAULT NULL,
  img_alt varchar(255) DEFAULT NULL,
  img_title varchar(255) DEFAULT NULL,
  full_text mediumtext NOT NULL,
  author varchar(100) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY link(link)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;