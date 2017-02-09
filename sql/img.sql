/*CREATE TABLE IF NOT EXISTS news_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS article_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;*/

CREATE TABLE IF NOT EXISTS default_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

/*Специфические таблицы*/

/*CREATE TABLE IF NOT EXISTS gallery_fireplace_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_barbecue_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_sauna_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_pool_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_marble_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_tile_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_ceiling_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS gallery_reservoirs_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;*/
/*taimod*/
CREATE TABLE IF NOT EXISTS lf_kulinar_hitrost_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS lf_raznoe_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS lic_znamenit_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS lic_citati_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS moda_hist_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS moda_style_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

/** cooc **/
CREATE TABLE IF NOT EXISTS cook_first_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS cook_second_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS cook_snack_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS cook_salad_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS cook_sauce_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS cook_bake_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS cook_dessert_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS cook_drink_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS psych_relationships_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS psych_human_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

/*CREATE TABLE IF NOT EXISTS r_img(
  id int(11) NOT NULL AUTO_INCREMENT,
  name_file varchar(255) NOT NULL,
  png tinyint(1) DEFAULT NULL,
  content longblob NOT NULL,
  PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;