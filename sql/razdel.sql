CREATE TABLE IF NOT EXISTS uhod_sovet_rodit(
  id int(11) NOT NULL AUTO_INCREMENT,
  link varchar(255) NOT NULL,
  link_name varchar(255) NOT NULL,
  link_turn tinyint(4) DEFAULT NULL,
  title varchar(255) NOT NULL,
  meta_d varchar(255) NOT NULL,
  meta_k varchar(255) NOT NULL,
  caption varchar(255) NOT NULL,
  img_s varchar(255) DEFAULT NULL,
  img_alt_s varchar(255) DEFAULT NULL,
  img_title_s varchar(255) DEFAULT NULL,
  short_text text NOT NULL,
  img varchar(255) DEFAULT NULL,
  img_alt varchar(255) DEFAULT NULL,
  img_title varchar(255) DEFAULT NULL,
  full_text text NOT NULL,
  full_text_for_bot text DEFAULT NULL,
  ref_link varchar(255) DEFAULT NULL,
  player tinyint(4) DEFAULT NULL,
  player_link varchar(255) DEFAULT NULL,
  data date NOT NULL,
  comment INT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY link(link)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;